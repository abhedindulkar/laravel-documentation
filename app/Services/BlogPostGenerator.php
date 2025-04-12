<?php

namespace App\Services;

use App\Facades\Claude;

class BlogPostGenerator
{
    public function __construct(private AiServiceInterface $aiService) {}

    public function generate(string $prompt): string
    {
        // return $this->aiService::generateText($prompt);

        return ClaudeAiService::generateText($prompt);
    }
}
