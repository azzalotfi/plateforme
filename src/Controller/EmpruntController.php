<?php

namespace App\Controller;

use App\Entity\Emprunt;
use App\Entity\Livre;
use App\Repository\EmpruntRepository;
use App\Repository\LivreRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/emprunt')]
class EmpruntController extends AbstractController
{
    #[Route('/livre/{id}', name: 'app_emprunt_livre', methods: ['GET'])]
    #[IsGranted('ROLE_USER')]
    public function borrowBook(Livre $livre, EntityManagerInterface $entityManager, EmpruntRepository $empruntRepository): Response
    {
        // Check if the user is logged in
        $user = $this->getUser();
        if (!$user) {
            $this->addFlash('error', 'Vous devez être connecté pour emprunter un livre.');
            return $this->redirectToRoute('app_login');
        }

        // Check if the book is available
        if (!$livre->isDisponible()) {
            $this->addFlash('error', 'Ce livre n\'est pas disponible pour l\'emprunt.');
            return $this->redirectToRoute('app_livre_show', ['id' => $livre->getId()]);
        }

        // Check if the user has already borrowed this book
        $existingEmprunt = $empruntRepository->findOneBy([
            'livre' => $livre->getId(),
            'utilisateur' => $user->getId()
        ]);

        if ($existingEmprunt) {
            $this->addFlash('error', 'Vous avez déjà emprunté ce livre.');
            return $this->redirectToRoute('app_livre_show', ['id' => $livre->getId()]);
        }

        // Create a new borrowing record
        $emprunt = new Emprunt();
        $emprunt->setLivre($livre);
        $emprunt->setUtilisateur($user);
        
        // Set the dates (today for borrowing, today + 14 days for return)
        $dateEmprunt = new DateTime();
        $dateRetour = (clone $dateEmprunt)->modify('+14 days');
        
        $emprunt->setDateEmprunt($dateEmprunt);
        $emprunt->setDateRetour($dateRetour);
        
        // Set the book as unavailable
        $livre->setDisponible(false);
        
        // Save to database
        $entityManager->persist($emprunt);
        $entityManager->persist($livre);
        $entityManager->flush();
        
        $this->addFlash('success', 'Livre emprunté avec succès ! Date de retour : ' . $dateRetour->format('d/m/Y'));
        
        return $this->redirectToRoute('app_livre_show', ['id' => $livre->getId()]);
    }

    #[Route('/retour/{id}', name: 'app_emprunt_retour', methods: ['GET'])]
    #[IsGranted('ROLE_USER')]
    public function returnBook(Emprunt $emprunt, EntityManagerInterface $entityManager): Response
    {
        // Check if the user is the one who borrowed the book
        $user = $this->getUser();
        if ($emprunt->getUtilisateur()->getId() !== $user->getId() && !$this->isGranted('ROLE_ADMIN')) {
            $this->addFlash('error', 'Vous ne pouvez pas retourner un livre que vous n\'avez pas emprunté.');
            return $this->redirectToRoute('app_account');
        }

        // Get the book and set it as available
        $livre = $emprunt->getLivre();
        $livre->setDisponible(true);
        
        // Remove the borrowing record
        $entityManager->remove($emprunt);
        $entityManager->persist($livre);
        $entityManager->flush();
        
        $this->addFlash('success', 'Livre retourné avec succès !');
        
        return $this->redirectToRoute('app_account');
    }
} 