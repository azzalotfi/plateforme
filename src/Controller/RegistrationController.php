<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(
        Request $request,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $passwordHasher
    ): Response {
        if ($request->isMethod('POST')) {
            $data = $request->request;

            $user = new User();
            $user->setNom($data->get('nom'));
            $user->setPrenom($data->get('prenom'));
            $user->setEmail($data->get('email'));

            
            $hashedPassword = $passwordHasher->hashPassword($user, $data->get('motDePasse'));
            $user->setMotDePasse($hashedPassword);

            $user->setTel($data->get('tel'));
            $user->setAdresse($data->get('adresse'));
            $user->setDateInscription(new \DateTime());

            $role = $data->get('role');
            switch ($role) {
                case 'admin':
                    $user->setRole('ROLE_ADMIN');
                    break;
                case 'prestataire':
                    $user->setRole('ROLE_PRESTATAIRE');
                    break;
                default:
                    $user->setRole('ROLE_CLIENT'); 
            }

            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Compte créé avec succès ! Vous pouvez vous connecter.');
            return $this->redirectToRoute('app_login');
        }

        return $this->render('registration/register.html.twig');
    }
}
