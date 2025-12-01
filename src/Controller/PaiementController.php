<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Stripe\Stripe;
use Stripe\Charge;

class PaiementController extends AbstractController
{
    #[Route('/paiement', name: 'paiement')]
    public function index(): \Symfony\Component\HttpFoundation\Response
    {
        return $this->render('paiement/index.html.twig', [
            'stripe_public_key' => $_ENV['STRIPE_PUBLIC_KEY'],
        ]);
    }

    #[Route('/paiement/submit', name: 'paiement_submit', methods: ['POST'])]
    public function submit(Request $request, ManagerRegistry $doctrine): JsonResponse
    {
        try {
            $user = $this->getUser();
            if (!$user) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Utilisateur non connecté'
                ], 403);
            }

            $data = json_decode($request->getContent(), true);
            if (!$data) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Données JSON invalides'
                ], 400);
            }

            $token = $data['paymentToken'] ?? null;
            $amount = isset($data['amount']) ? (int)$data['amount'] : 0;

            if (!$token || $amount <= 0) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Données de paiement invalides'
                ], 400);
            }

            Stripe::setApiKey($_ENV['STRIPE_SECRET_KEY']);

            $charge = Charge::create([
                'amount' => $amount, // en centimes
                'currency' => 'eur',
                'source' => $token,
                'description' => 'Paiement utilisateur #' . $user->getId(),
            ]);

            if ($charge->status !== 'succeeded') {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Paiement échoué'
                ], 400);
            }

            if ($charge->status === 'succeeded') {
    $points = ($amount / 100) * 10; // Conversion € -> points
    $user->setTotalGains($user->getTotalGains() + $points);

    $em = $doctrine->getManager();
    $em->flush();

    return new JsonResponse([
        'success' => true,
        'points' => $points, // ← juste le montant payé converti en points
        'message' => 'Paiement réussi ! Points ajoutés.'
    ]);
}


        } catch (\Throwable $e) {
            // Toujours renvoyer du JSON même en erreur
            return new JsonResponse([
                'success' => false,
                'message' => 'Erreur serveur : ' . $e->getMessage()
            ], 500);
        }
    }
}
