<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile', methods: ['GET', 'POST'])]
    public function index(Request $request, Security $security, EntityManagerInterface $em): Response
    {
      
        $user = $security->getUser();
        if (!$user instanceof User) {
            return $this->redirectToRoute('app_login');
        }

       
        if ($request->isMethod('POST')) {
            $user->setNom($request->request->get('nom', $user->getNom()));
            $user->setPrenom($request->request->get('prenom', $user->getPrenom() ?? ''));
            $user->setTel($request->request->get('tel', $user->getTel()));
            $user->setAdresse($request->request->get('adresse', $user->getAdresse()));
            $user->setBio($request->request->get('bio', $user->getBio()));
            $user->setCompetences($request->request->get('competences', $user->getCompetences()));
            
            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Profil mis à jour avec succès !');
            return $this->redirectToRoute('app_profile');
        }

        return $this->render('profile/index.html.twig', [
            'user' => $user
        ]);
    }
}