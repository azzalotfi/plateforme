<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PaiementController extends AbstractController
{
    #[Route('/paiement', name: 'paiement')]
    public function index()
    {
        return $this->render('paiement/index.html.twig');
    }

    #[Route('/paiement/submit', name: 'paiement_submit', methods: ['POST'])]
    public function submit()
    {
        // Traitement du paiement ici
        return $this->redirectToRoute('paiement');
    }
}
