<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Reservation;
use App\Entity\Service;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SecurityBundle\Security;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(Security $security, EntityManagerInterface $em): Response
    {

        $user = $security->getUser();
        if (!$user instanceof User) {
            return $this->redirectToRoute('app_login');
        }


        if (!$this->isGranted('ROLE_CLIENT')) {
            return $this->redirectToRoute('app_profile');
        }

        // Get client entity associated with the user
        $client = $em->getRepository(\App\Entity\Client::class)->findOneBy(['user' => $user]);

        if (!$client) {
            // If no client entity exists, create one
            $client = new \App\Entity\Client();
            $client->setUser($user);
            $client->setNom($user->getNom());
            $client->setPrenom($user->getPrenom());
            $em->persist($client);
            $em->flush();
        }

        // Get all reservations for this client
        $allReservations = $client->getReservations()->toArray();

        usort($allReservations, function ($a, $b) {
            if (!$a->getDateReservation() || !$b->getDateReservation())
                return 0;
            return $b->getDateReservation() <=> $a->getDateReservation();
        });

        $userReservations = array_slice($allReservations, 0, 10);


        $totalReservations = count($allReservations);
        $reservationsEnCours = count(array_filter(
            $allReservations,
            fn($r) =>
            $r->getStatut() && (
                $r->getStatut() === 'en_cours' ||
                $r->getStatut() === 'En attente' ||
                $r->getStatut() === 'en_attente' ||
                stripos($r->getStatut(), 'attente') !== false
            )
        ));
        $reservationsCompletees = count(array_filter(
            $allReservations,
            fn($r) =>
            $r->getStatut() && (
                $r->getStatut() === 'complete' ||
                $r->getStatut() === 'Complétée' ||
                $r->getStatut() === 'termine' ||
                stripos($r->getStatut(), 'complete') !== false
            )
        ));
        $montantTotal = array_sum(array_map(fn($r) => $r->getMontantTotal() ?? 0, $allReservations));

        $services = $em->getRepository(Service::class)->findBy(['disponible' => true], ['nomService' => 'ASC'], 6);

        return $this->render('dashboard/client/index.html.twig', [
            'user' => $user,
            'reservations' => $userReservations,
            'services' => $services,
            'stats' => [
                'totalReservations' => $totalReservations,
                'reservationsEnCours' => $reservationsEnCours,
                'reservationsCompletees' => $reservationsCompletees,
                'montantTotal' => $montantTotal,
            ],
        ]);
    }
}

