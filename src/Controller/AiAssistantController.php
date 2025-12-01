<?php

namespace App\Controller;

use App\Service\AiAssistantService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AiAssistantController extends AbstractController
{
    private AiAssistantService $aiAssistantService;

    public function __construct(AiAssistantService $aiAssistantService)
    {
        $this->aiAssistantService = $aiAssistantService;
    }

    #[Route('/ai-assistant', name: 'app_ai_assistant')]
    public function index(): Response
    {
        // Check if user is authenticated (optional - remove if you want public access)
        // $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // Check if AI service is available
        $isAvailable = $this->aiAssistantService->isAvailable();

        return $this->render('ai_assistant/chat.html.twig', [
            'service_available' => $isAvailable,
        ]);
    }

    #[Route('/api/ai-assistant/chat', name: 'app_ai_assistant_chat', methods: ['POST'])]
    public function chat(Request $request): JsonResponse
    {
        // Check if user is authenticated (optional - remove if you want public access)
        // $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $data = json_decode($request->getContent(), true);
        $message = $data['message'] ?? '';

        if (empty($message)) {
            return new JsonResponse([
                'success' => false,
                'error' => 'No message provided',
            ], Response::HTTP_BAD_REQUEST);
        }

        // Send message to AI assistant
        $result = $this->aiAssistantService->sendMessage($message);

        if ($result['success']) {
            return new JsonResponse([
                'success' => true,
                'response' => $result['response'],
                'response_text' => $result['response_text'] ?? '',
            ]);
        } else {
            return new JsonResponse([
                'success' => false,
                'error' => $result['error'] ?? 'Unknown error',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    #[Route('/api/ai-assistant/health', name: 'app_ai_assistant_health', methods: ['GET'])]
    public function health(): JsonResponse
    {
        $isAvailable = $this->aiAssistantService->isAvailable();

        return new JsonResponse([
            'available' => $isAvailable,
            'status' => $isAvailable ? 'ok' : 'unavailable',
        ]);
    }
}
