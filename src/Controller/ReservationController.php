<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Entity\Service;
use App\Entity\User;
use App\Entity\Client;
use App\Entity\Notification;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SecurityBundle\Security;

class ReservationController extends AbstractController
{
    #[Route('/reservation/new/{id}', name: 'app_reservation_new', methods: ['GET', 'POST'])]
    public function new(int $id, Request $request, EntityManagerInterface $em, Security $security): Response
    {
        $user = $security->getUser();

        if (!$user instanceof User) {
            return $this->redirectToRoute('app_login');
        }

        $service = $em->getRepository(Service::class)->find($id);
        if (!$service) {
            throw $this->createNotFoundException('Service non trouvé');
        }

        // Vérifier le solde du client avant POST
        $prixService = $service->getPrix();
        if ($user->getTotalGains() < $prixService) {
            $this->addFlash('error', 'Votre solde est insuffisant pour réserver ce service.');
            return $this->redirectToRoute('services');
        }

        if ($request->isMethod('POST')) {
            $reservation = new Reservation();
            $reservation->setService($service);
            $reservation->setPrestataire($service->getPrestataire());

            // Création ou récupération du client
            $client = $em->getRepository(Client::class)->findOneBy(['user' => $user]);
            if (!$client) {
                $client = new Client();
                $client->setUser($user);
                $client->setNom($user->getNom());
                $client->setPrenom($user->getPrenom());
                $em->persist($client);
            } else {
                $client->setNom($user->getNom());
                $client->setPrenom($user->getPrenom());
            }
            $reservation->setClient($client);

            // Date, heure, lieu
            $reservation->setDateReservation(new \DateTimeImmutable($request->request->get('date')));
            $heure = $request->request->get('heure');
            if ($heure) {
                $reservation->setHeure(new \DateTime($heure));
            }
            $lieu = $request->request->get('lieu');
            if ($lieu) {
                $reservation->setLieu($lieu);
            }

            // Statut initial et montant bloqué
            $reservation->setStatut('En attente');
            $reservation->setMontantTotal($prixService);

            // Débiter le montant du client
            $user->setTotalGains($user->getTotalGains() - $prixService);

            $em->persist($reservation);
            $em->flush();

            // Notification prestataire
            $notification = new Notification();
            $notification->setUser($service->getPrestataire()->getUser());
            $notification->setMessage("Nouvelle demande de réservation pour " . $service->getNomService() . " par " . $client->getNom() . " " . $client->getPrenom());
            $notification->setType('reservation');
            $notification->setRelatedEntityId($reservation->getId());
            $em->persist($notification);
            $em->flush();

            return $this->redirectToRoute('services');
        }

        return $this->render('reservation/new.html.twig', [
            'service' => $service,
        ]);
    }

    // ------------------ Marquer réservation comme terminée ------------------


    #[Route('/provider/reservation/{id}/complete', name: 'app_reservation_complete', methods: ['POST'])]
    public function complete(int $id, EntityManagerInterface $em, Security $security)
    {
        $user = $security->getUser(); // Prestataire connecté
        $reservation = $em->getRepository(Reservation::class)->find($id);

        if (!$reservation || $reservation->getPrestataire()->getUser() !== $user) {
            $this->addFlash('error', 'Réservation introuvable ou accès refusé.');
            return $this->redirectToRoute('app_provider_dashboard'); // rediriger vers le tableau
        }

        if ($reservation->getStatut() !== 'Confirmée') {
            $this->addFlash('error', 'La réservation n’est pas dans un état valide.');
            return $this->redirectToRoute('app_provider_dashboard');
        }

        $montantTotal = $reservation->getMontantTotal();

        // Calcul de la commission admin
        $commissionAdmin = round($montantTotal * 0.10, 2); // 10 %
        $montantPrestataire = $montantTotal - $commissionAdmin;

        // Transfert du montant au prestataire
        $prestataireUser = $reservation->getPrestataire()->getUser();
        $prestataireUser->setTotalGains($prestataireUser->getTotalGains() + $montantPrestataire);



        // Ajouter la commission à l'admin
        $adminUser = $em->getRepository(User::class)->findOneBy(['role' => 'admin']);
        if ($adminUser) {
            $adminUser->setTotalGains($adminUser->getTotalGains() + $commissionAdmin);
        }

        // Mise à jour du statut
        $reservation->setStatut('Terminé');

        $em->flush();

        // Ajouter message de succès
        $this->addFlash('success', sprintf(
            'Réservation terminée. %.2f TND vers prestataire et %.2f TND pour admin.',
            $montantPrestataire,
            $commissionAdmin
        ));

        return $this->redirectToRoute('app_provider_dashboard'); // retour vers le tableau
    }


}
