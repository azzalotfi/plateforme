<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Service;
use App\Entity\Reservation;
use App\Entity\Prestataire;
use App\Entity\Notification;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SecurityBundle\Security;

class ProviderDashboardController extends AbstractController
{
    #[Route('/provider/dashboard', name: 'app_provider_dashboard')]
    public function index(Security $security, EntityManagerInterface $em): Response
    {
        $user = $security->getUser();
        if (!$user instanceof User) {
            return $this->redirectToRoute('app_login');
        }

        if (!$this->isGranted('ROLE_PRESTATAIRE')) {
            return $this->redirectToRoute('app_dashboard');
        }

        // Try to find Prestataire entity linked to user
        $prestataire = $em->getRepository(Prestataire::class)->findOneBy(['user' => $user]);

        // If not found, create it (migration for existing users)
        if (!$prestataire) {
            $prestataire = new Prestataire();
            $prestataire->setUser($user);
            // Set default values if needed
            $em->persist($prestataire);
            $em->flush();
        }

        // Get provider's services and reservations
        $services = [];
        $reservations = [];

        if ($prestataire) {
            $services = $em->getRepository(Service::class)->findBy(
                ['prestataire' => $prestataire],
                ['id' => 'DESC']
            );

            $reservations = $em->getRepository(Reservation::class)->findBy(
                ['prestataire' => $prestataire],
                ['dateReservation' => 'DESC']
            );
        }

        // Calculate statistics
        $activeServices = count(array_filter($services, fn($s) => $s->isDisponible()));

        $completedReservations = array_filter($reservations, function ($r) {
            $statut = $r->getStatut();
            return $statut && (
                $statut === 'complete' ||
                $statut === 'Complétée' ||
                stripos($statut, 'complet') !== false
            );
        });

        $totalEarnings = array_sum(array_map(fn($r) => $r->getMontantTotal() ?? 0, $completedReservations));

        return $this->render('dashboard/provider/index.html.twig', [
            'user' => $user,
            'prestataire' => $prestataire,
            'services' => $services,
            'reservations' => $reservations,
            'stats' => [
                'totalServices' => count($services),
                'activeServices' => $activeServices,
                'totalReservations' => count($reservations),
                'totalEarnings' => $totalEarnings,
            ],
        ]);
    }

    #[Route('/provider/service/{id}/delete', name: 'app_provider_service_delete', methods: ['POST'])]
    public function deleteService(int $id, Security $security, EntityManagerInterface $em): Response
    {
        $user = $security->getUser();
        if (!$user instanceof User || !$this->isGranted('ROLE_PRESTATAIRE')) {
            return $this->json(['success' => false, 'message' => 'Non autorisé'], 403);
        }

        $service = $em->getRepository(Service::class)->find($id);

        if (!$service) {
            return $this->json(['success' => false, 'message' => 'Service non trouvé'], 404);
        }

        $prestataire = $em->getRepository(Prestataire::class)->findOneBy(['user' => $user]);
        if (!$prestataire || $service->getPrestataire() !== $prestataire) {
            return $this->json(['success' => false, 'message' => 'Non autorisé'], 403);
        }

        try {
            $em->remove($service);
            $em->flush();

            $this->addFlash('success', 'Service supprimé avec succès.');
            return $this->json(['success' => true]);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'message' => 'Erreur lors de la suppression'], 500);
        }
    }

    #[Route('/provider/reservation/{id}/accept', name: 'app_provider_reservation_accept', methods: ['POST'])]
    public function acceptReservation(int $id, Security $security, EntityManagerInterface $em): Response
    {
        $user = $security->getUser();
        if (!$user instanceof User || !$this->isGranted('ROLE_PRESTATAIRE')) {
            return $this->json(['success' => false, 'message' => 'Non autorisé'], 403);
        }

        $reservation = $em->getRepository(Reservation::class)->find($id);

        if (!$reservation) {
            return $this->json(['success' => false, 'message' => 'Réservation non trouvée'], 404);
        }

        $prestataire = $em->getRepository(Prestataire::class)->findOneBy(['user' => $user]);
        if (!$prestataire || $reservation->getPrestataire() !== $prestataire) {
            return $this->json(['success' => false, 'message' => 'Non autorisé'], 403);
        }

       
            $reservation->setStatut('Confirmée');

            // Notify Client
            if ($reservation->getClient() && $reservation->getClient()->getUser()) {
                $notification = new Notification();
                $notification->setUser($reservation->getClient()->getUser());
                $notification->setMessage("Votre réservation pour " . $reservation->getService()->getNomService() . " a été acceptée.");
                $notification->setType('reservation');
                $notification->setRelatedEntityId($reservation->getId());
                $em->persist($notification);
            }

            $em->flush();

            $this->addFlash('success', 'Réservation acceptée.');
    return $this->redirectToRoute('app_provider_dashboard');
      
    }

    
#[Route('/provider/reservation/{id}/refuse', name: 'app_reservation_refuse', methods: ['POST'])]
public function refuse(int $id, EntityManagerInterface $em, Security $security): Response
{
    $user = $security->getUser();
    $reservation = $em->getRepository(Reservation::class)->find($id);

    if (!$reservation || $reservation->getPrestataire()->getUser() !== $user) {
        $this->addFlash('error', 'Réservation introuvable ou accès refusé.');
        return $this->redirectToRoute('app_provider_dashboard');
    }

    

    // Remise du montant au client (si bloqué sur son compte virtuel)
    $clientUser = $reservation->getClient()->getUser();
    $montant = $reservation->getMontantTotal();

    if ($clientUser) {
        $clientUser->setTotalGains($clientUser->getTotalGains() + $montant); // remboursement
    }

    // Mise à jour du statut
    $reservation->setStatut('Refusée');

    $em->flush();

    $this->addFlash('error', sprintf('Réservation refusée. %.2f TND remboursés au client.', $montant));

    return $this->redirectToRoute('app_provider_dashboard');
}

    #[Route('/provider/reservation/{id}', name: 'app_provider_reservation_show', methods: ['GET'])]
    public function showReservation(int $id, Security $security, EntityManagerInterface $em): Response
    {
        $user = $security->getUser();
        if (!$user instanceof User || !$this->isGranted('ROLE_PRESTATAIRE')) {
            return $this->redirectToRoute('app_login');
        }

        $reservation = $em->getRepository(Reservation::class)->find($id);

        if (!$reservation) {
            throw $this->createNotFoundException('Réservation non trouvée');
        }

        $prestataire = $em->getRepository(Prestataire::class)->findOneBy(['user' => $user]);
        if (!$prestataire || $reservation->getPrestataire() !== $prestataire) {
            throw $this->createAccessDeniedException('Non autorisé');
        }

        return $this->render('dashboard/provider/reservation_show.html.twig', [
            'reservation' => $reservation,
        ]);
    }
}
