<?php

namespace App\Security;

use App\Entity\User;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    private RouterInterface $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token): RedirectResponse
    {
        $user = $token->getUser();

        if ($user instanceof User) {
            $roles = $user->getRoles();
            $role = $user->getRole();

            if (in_array('ROLE_ADMIN', $roles) || $role === 'admin') {
                return new RedirectResponse($this->router->generate('app_admin_dashboard'));
            } elseif (in_array('ROLE_PRESTATAIRE', $roles) || $role === 'prestataire') {
                return new RedirectResponse($this->router->generate('app_provider_dashboard'));
            } elseif (in_array('ROLE_CLIENT', $roles) || $role === 'client') {
                return new RedirectResponse($this->router->generate('app_dashboard'));
            }
        }

        // Default fallback
        return new RedirectResponse($this->router->generate('app_profile'));
    }
}
