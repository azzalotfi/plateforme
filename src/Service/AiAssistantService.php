<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Psr\Log\LoggerInterface;

class AiAssistantService
{
    private HttpClientInterface $httpClient;
    private LoggerInterface $logger;
    private string $aiAssistantUrl;

    public function __construct(
        HttpClientInterface $httpClient,
        LoggerInterface $logger,
        string $aiAssistantUrl
    ) {
        $this->httpClient = $httpClient;
        $this->logger = $logger;
        $this->aiAssistantUrl = $aiAssistantUrl;
    }

    /**
     * Send a message to the AI assistant and get a response
     *
     * @param string $message The user's message
     * @return array Response containing 'success', 'response', and optionally 'error'
     */
    public function sendMessage(string $message): array
    {
        try {
            $response = $this->httpClient->request('POST', $this->aiAssistantUrl . '/api/chat', [
                'json' => ['message' => $message],
                'timeout' => 30,
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode === 200) {
                $data = $response->toArray();
                return [
                    'success' => true,
                    'response' => $data['response'] ?? '',
                    'response_text' => $data['response_text'] ?? '',
                ];
            } else {
                $this->logger->error('AI Assistant returned non-200 status', [
                    'status_code' => $statusCode,
                    'message' => $message,
                ]);

                return [
                    'success' => false,
                    'error' => 'Service temporarily unavailable',
                ];
            }
        } catch (\Exception $e) {
            $this->logger->error('Error communicating with AI Assistant', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return [
                'success' => false,
                'error' => 'Unable to connect to AI assistant. Please try again later.',
            ];
        }
    }

    /**
     * Check if the AI assistant service is available
     *
     * @return bool
     */
    public function isAvailable(): bool
    {
        try {
            $response = $this->httpClient->request('GET', $this->aiAssistantUrl . '/health', [
                'timeout' => 5,
            ]);

            return $response->getStatusCode() === 200;
        } catch (\Exception $e) {
            $this->logger->warning('AI Assistant health check failed', [
                'message' => $e->getMessage(),
            ]);

            return false;
        }
    }
}
