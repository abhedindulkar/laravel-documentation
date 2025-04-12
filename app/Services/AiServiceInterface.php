<?php

namespace App\Services;

interface AiServiceInterface {

    public function generateText(string $prompt);
    public function generateImage(string $prompt);
}
