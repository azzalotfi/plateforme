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

        $allReservations = [];
        
        
        $client = $em->getRepository(\App\Entity\Client::class)->find($user->getId());
        if ($client) {
            $allReservations = $client->getReservations()->toArray();
        } else {
            
            try {
                if (method_exists($user, 'getReservations')) {
                    $allReservations = $user->getReservations()->toArray();
                }
            } catch (\Exception $e) {
                $allReservations = $em->getRepository(Reservation::class)
                    ->createQueryBuilder('r')
                    ->where('r.client = :clientId')
                    ->setParameter('clientId', $user->getId())
                    ->orderBy('r.dateReservation', 'DESC')
                    ->getQuery()
                    ->getResult();
            }
        }
        
        usort($allReservations, function($a, $b) {
            if (!$a->getDateReservation() || !$b->getDateReservation()) return 0;
            return $b->getDateReservation() <=> $a->getDateReservation();
        });
        
        $userReservations = array_slice($allReservations, 0, 10);

        
        $totalReservations = count($allReservations);
        $reservationsEnCours = count(array_filter($allReservations, fn($r) => 
            $r->getStatut() && (
                $r->getStatut() === 'en_cours' || 
                $r->getStatut() === 'En attente' || 
                $r->getStatut() === 'en_attente' ||
                stripos($r->getStatut(), 'attente') !== false
            )
        ));
        $reservationsCompletees = count(array_filter($allReservations, fn($r) => 
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

