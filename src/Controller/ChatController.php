<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Client;
use App\Entity\Prestataire;
use App\Entity\Service;
use App\Entity\Conversation;
use App\Entity\Message;
use App\Entity\Notification;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SecurityBundle\Security;

class ChatController extends AbstractController
{
    #[Route('/chat', name: 'app_chat')]
    public function index(Security $security, EntityManagerInterface $em): Response
    {
        $user = $security->getUser();
        if (!$user instanceof User) {
            return $this->redirectToRoute('app_login');
        }

        // Get all conversations for this user
        $conversations = [];

        if ($this->isGranted('ROLE_CLIENT')) {
            $client = $em->getRepository(Client::class)->findOneBy(['user' => $user]);
            if ($client) {
                $conversations = $em->getRepository(Conversation::class)->findBy(
                    ['client' => $client],
                    ['lastMessageAt' => 'DESC']
                );
            }
        } elseif ($this->isGranted('ROLE_PRESTATAIRE')) {
            $prestataire = $em->getRepository(Prestataire::class)->findOneBy(['user' => $user]);
            if ($prestataire) {
                $conversations = $em->getRepository(Conversation::class)->findBy(
                    ['prestataire' => $prestataire],
                    ['lastMessageAt' => 'DESC']
                );
            }
        }

        return $this->render('chat/index.html.twig', [
            'conversations' => $conversations,
            'user' => $user
        ]);
    }

    #[Route('/chat/conversation/{id}', name: 'app_chat_conversation')]
    public function conversation(int $id, Security $security, EntityManagerInterface $em): Response
    {
        $user = $security->getUser();
        if (!$user instanceof User) {
            return $this->redirectToRoute('app_login');
        }

        $conversation = $em->getRepository(Conversation::class)->find($id);
        if (!$conversation) {
            throw $this->createNotFoundException('Conversation non trouvée');
        }

        // Verify user has access to this conversation
        $hasAccess = false;
        if ($this->isGranted('ROLE_CLIENT')) {
            $client = $em->getRepository(Client::class)->findOneBy(['user' => $user]);
            $hasAccess = $client && $conversation->getClient() === $client;
        } elseif ($this->isGranted('ROLE_PRESTATAIRE')) {
            $prestataire = $em->getRepository(Prestataire::class)->findOneBy(['user' => $user]);
            $hasAccess = $prestataire && $conversation->getPrestataire() === $prestataire;
        }

        if (!$hasAccess) {
            throw $this->createAccessDeniedException('Accès non autorisé');
        }

        // Mark messages as read
        foreach ($conversation->getMessages() as $message) {
            if ($message->getSender() !== $user && !$message->isRead()) {
                $message->setIsRead(true);
            }
        }
        $em->flush();

        return $this->render('chat/conversation.html.twig', [
            'conversation' => $conversation,
            'user' => $user
        ]);
    }

    #[Route('/chat/conversation/{id}/send', name: 'app_chat_send', methods: ['POST'])]
    public function sendMessage(int $id, Request $request, Security $security, EntityManagerInterface $em): JsonResponse
    {
        $user = $security->getUser();
        if (!$user instanceof User) {
            return $this->json(['success' => false, 'message' => 'Non autorisé'], 403);
        }

        $conversation = $em->getRepository(Conversation::class)->find($id);
        if (!$conversation) {
            return $this->json(['success' => false, 'message' => 'Conversation non trouvée'], 404);
        }

        $content = $request->request->get('content');
        if (empty(trim($content))) {
            return $this->json(['success' => false, 'message' => 'Message vide'], 400);
        }

        // Create message
        $message = new Message();
        $message->setConversation($conversation);
        $message->setSender($user);
        $message->setContent(trim($content));

        $conversation->setLastMessageAt(new \DateTimeImmutable());

        $em->persist($message);

        // Create notification for recipient
        $recipient = null;
        if ($this->isGranted('ROLE_CLIENT')) {
            $recipient = $conversation->getPrestataire()->getUser();
        } elseif ($this->isGranted('ROLE_PRESTATAIRE')) {
            $recipient = $conversation->getClient()->getUser();
        }

        if ($recipient) {
            $notification = new Notification();
            $notification->setUser($recipient);
            $notification->setMessage("Nouveau message de " . $user->getNom() . " " . $user->getPrenom());
            $notification->setType('message');
            $notification->setRelatedEntityId($conversation->getId());
            $em->persist($notification);
        }

        $em->flush();

        return $this->json([
            'success' => true,
            'message' => [
                'id' => $message->getId(),
                'content' => $message->getContent(),
                'createdAt' => $message->getCreatedAt()->format('Y-m-d H:i:s'),
                'senderName' => $user->getNom() . ' ' . $user->getPrenom()
            ]
        ]);
    }

    #[Route('/chat/conversation/{id}/new-messages', name: 'app_chat_new_messages', methods: ['GET'])]
    public function getNewMessages(int $id, Request $request, Security $security, EntityManagerInterface $em): JsonResponse
    {
        $user = $security->getUser();
        if (!$user instanceof User) {
            return $this->json(['success' => false], 403);
        }

        $conversation = $em->getRepository(Conversation::class)->find($id);
        if (!$conversation) {
            return $this->json(['success' => false], 404);
        }

        $lastId = (int) $request->query->get('lastId', 0);

        $newMessages = $em->getRepository(Message::class)
            ->createQueryBuilder('m')
            ->where('m.conversation = :conversation')
            ->andWhere('m.id > :lastId')
            ->setParameter('conversation', $conversation)
            ->setParameter('lastId', $lastId)
            ->orderBy('m.createdAt', 'ASC')
            ->getQuery()
            ->getResult();

        $messages = array_map(function (Message $message) use ($user) {
            return [
                'id' => $message->getId(),
                'content' => $message->getContent(),
                'createdAt' => $message->getCreatedAt()->format('Y-m-d H:i:s'),
                'senderName' => $message->getSender()->getNom() . ' ' . $message->getSender()->getPrenom(),
                'isMine' => $message->getSender() === $user
            ];
        }, $newMessages);

        // Mark as read if not mine
        foreach ($newMessages as $message) {
            if ($message->getSender() !== $user && !$message->isRead()) {
                $message->setIsRead(true);
            }
        }
        $em->flush();

        return $this->json(['success' => true, 'messages' => $messages]);
    }

    #[Route('/chat/message/{id}/delete', name: 'app_chat_message_delete', methods: ['POST'])]
    public function deleteMessage(int $id, Security $security, EntityManagerInterface $em): JsonResponse
    {
        $user = $security->getUser();
        if (!$user instanceof User) {
            return $this->json(['success' => false, 'message' => 'Non autorisé'], 403);
        }

        $message = $em->getRepository(Message::class)->find($id);
        if (!$message) {
            return $this->json(['success' => false, 'message' => 'Message non trouvé'], 404);
        }

        if ($message->getSender() !== $user) {
            return $this->json(['success' => false, 'message' => 'Non autorisé'], 403);
        }

        $em->remove($message);
        $em->flush();

        return $this->json(['success' => true]);
    }

    #[Route('/chat/unread-count', name: 'app_chat_unread_count', methods: ['GET'])]
    public function getUnreadCount(Security $security, EntityManagerInterface $em): JsonResponse
    {
        $user = $security->getUser();
        if (!$user instanceof User) {
            return $this->json(['count' => 0]);
        }

        $count = 0;

        if ($this->isGranted('ROLE_CLIENT')) {
            $client = $em->getRepository(Client::class)->findOneBy(['user' => $user]);
            if ($client) {
                $conversations = $em->getRepository(Conversation::class)->findBy(['client' => $client]);
                foreach ($conversations as $conversation) {
                    $count += $conversation->getUnreadCount($user);
                }
            }
        } elseif ($this->isGranted('ROLE_PRESTATAIRE')) {
            $prestataire = $em->getRepository(Prestataire::class)->findOneBy(['user' => $user]);
            if ($prestataire) {
                $conversations = $em->getRepository(Conversation::class)->findBy(['prestataire' => $prestataire]);
                foreach ($conversations as $conversation) {
                    $count += $conversation->getUnreadCount($user);
                }
            }
        }

        return $this->json(['count' => $count]);
    }

    #[Route('/chat/start/{prestataireId}', name: 'app_chat_start')]
    public function startConversation(int $prestataireId, Request $request, Security $security, EntityManagerInterface $em): Response
    {
        $user = $security->getUser();
        if (!$user instanceof User || !$this->isGranted('ROLE_CLIENT')) {
            return $this->redirectToRoute('app_login');
        }

        $client = $em->getRepository(Client::class)->findOneBy(['user' => $user]);
        if (!$client) {
            $client = new Client();
            $client->setUser($user);
            $client->setNom($user->getNom());
            $client->setPrenom($user->getPrenom());
            $em->persist($client);
            $em->flush();
        }

        $prestataire = $em->getRepository(Prestataire::class)->find($prestataireId);
        if (!$prestataire) {
            throw $this->createNotFoundException('Prestataire non trouvé');
        }

        // Check if conversation already exists
        $conversation = $em->getRepository(Conversation::class)->findOneBy([
            'client' => $client,
            'prestataire' => $prestataire
        ]);

        if (!$conversation) {
            $conversation = new Conversation();
            $conversation->setClient($client);
            $conversation->setPrestataire($prestataire);

            $serviceId = $request->query->get('service');
            if ($serviceId) {
                $service = $em->getRepository(Service::class)->find($serviceId);
                if ($service) {
                    $conversation->setService($service);
                }
            }

            $em->persist($conversation);
            $em->flush();
        }

        return $this->redirectToRoute('app_chat_conversation', ['id' => $conversation->getId()]);
    }
}
