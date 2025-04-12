<?php

namespace App\Services;

use GuzzleHttp\Client;

class OpenAiService implements AiServiceInterface
{
    public function __construct(private Client $client, String $apiKey){}

    public function generateText(string $prompt): string
    {
        //* use Client to make a request to the AI service.
        return "Generated text from OpenAi for prompt: " . $prompt;
    }

    public function generateImage(string $prompt): string
    {
        //* user Client to make a request to the AI service.

        return "Generated image from OpenAi for prompt: " . $prompt;
    }
}
