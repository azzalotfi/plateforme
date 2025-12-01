<?php

namespace App\Controller;

use App\Entity\Notification;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SecurityBundle\Security;

class NotificationController extends AbstractController
{
    public function header(Security $security, EntityManagerInterface $em): Response
    {
        $user = $security->getUser();

        if (!$user instanceof User) {
            return $this->render('partials/notification_icon.html.twig', [
                'unreadCount' => 0,
                'notifications' => []
            ]);
        }

        // Only show non-dismissed notifications in the dropdown
        $notifications = $em->getRepository(Notification::class)->findBy(
            [
                'user' => $user,
                'isDismissed' => false
            ],
            ['dateCreation' => 'DESC'],
            10 // Limit to 10 recent
        );

        $unreadCount = $em->getRepository(Notification::class)->count([
            'user' => $user,
            'isRead' => false,
            'isDismissed' => false // Also ignore dismissed for count
        ]);

        return $this->render('partials/notification_icon.html.twig', [
            'unreadCount' => $unreadCount,
            'notifications' => $notifications
        ]);
    }

    #[Route('/notifications', name: 'app_notifications', methods: ['GET'])]
    public function index(Security $security, EntityManagerInterface $em): Response
    {
        $user = $security->getUser();
        if (!$user instanceof User) {
            return $this->redirectToRoute('app_login');
        }

        // Show ALL notifications in history (even dismissed ones)
        $notifications = $em->getRepository(Notification::class)->findBy(
            ['user' => $user],
            ['dateCreation' => 'DESC']
        );

        return $this->render('notification/index.html.twig', [
            'notifications' => $notifications
        ]);
    }

    #[Route('/notification/unread-count', name: 'app_notification_unread_count', methods: ['GET'])]
    public function unreadCount(Security $security, EntityManagerInterface $em): Response
    {
        $user = $security->getUser();
        if (!$user instanceof User) {
            return $this->json(['count' => 0]);
        }

        $count = $em->getRepository(Notification::class)->count([
            'user' => $user,
            'isRead' => false,
            'isDismissed' => false
        ]);

        return $this->json(['count' => $count]);
    }

    #[Route('/notification/{id}/read', name: 'app_notification_read', methods: ['POST'])]
    public function markAsRead(int $id, Security $security, EntityManagerInterface $em): Response
    {
        $user = $security->getUser();
        if (!$user instanceof User) {
            return $this->json(['success' => false], 403);
        }

        $notification = $em->getRepository(Notification::class)->find($id);

        if (!$notification || $notification->getUser() !== $user) {
            return $this->json(['success' => false], 404);
        }

        $notification->setIsRead(true);
        $em->flush();

        return $this->json(['success' => true]);
    }

    #[Route('/notification/delete-all', name: 'app_notification_delete_all', methods: ['POST'])]
    public function deleteAll(Security $security, EntityManagerInterface $em): Response
    {
        $user = $security->getUser();
        if (!$user instanceof User) {
            return $this->json(['success' => false], 403);
        }

        // Find only non-dismissed notifications
        $notifications = $em->getRepository(Notification::class)->findBy([
            'user' => $user,
            'isDismissed' => false
        ]);

        foreach ($notifications as $notification) {
            // Soft delete: mark as dismissed instead of removing
            $notification->setIsDismissed(true);
            // Also mark as read so it doesn't count as unread in history if we want
            $notification->setIsRead(true);
        }
        $em->flush();

        return $this->json(['success' => true]);
    }
}
