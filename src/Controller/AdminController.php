<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class AdminController extends AbstractController
{
    #[Route('/admin/dashboard', name: 'app_admin_dashboard')]
    public function index(): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        return $this->render('admin/dashboard.html.twig', [
            'user' => $user,
            'totalGains' => $user->getTotalGains() ?? 0.0,
        ]);
    }
}
