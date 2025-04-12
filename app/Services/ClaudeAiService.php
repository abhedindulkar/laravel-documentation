<?php

namespace App\Services;

use GuzzleHttp\Client;

class ClaudeAiService implements AiServiceInterface
{
    private string $apiKey;
    public function __construct(private Client $client, String $apiKey){
        $this->apiKey = $apiKey;
    }

    public function generateText(string $prompt): string
    {
        //* use Client to make a request to the AI service.
        return "Generated text from Claude for prompt: " . $prompt . " " . $this->apiKey;
    }

    public function generateImage(string $prompt): string
    {
        //* user Client to make a request to the AI service.

        return "Generated image from Claude for prompt: " . $prompt . " " . $this->apiKey;
    }
}
