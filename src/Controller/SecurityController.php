<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            $user = $this->getUser();
            if (!$user instanceof \App\Entity\User) {
                return $this->redirectToRoute('app_logout');
            }

            $roles = $user->getRoles();
            $role = $user->getRole();

            if (in_array('ROLE_ADMIN', $roles) || $role === 'admin') {
                return $this->redirectToRoute('app_admin_dashboard');
            } elseif (in_array('ROLE_PRESTATAIRE', $roles) || $role === 'prestataire') {
                return $this->redirectToRoute('app_provider_dashboard');
            } elseif (in_array('ROLE_CLIENT', $roles) || $role === 'client') {
                return $this->redirectToRoute('app_dashboard');
            }
            return $this->redirectToRoute('app_profile');
        }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
