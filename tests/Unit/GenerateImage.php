<?php

use App\Services\ImageGenerator;
use App\Services\OpenAiService;
use GuzzleHttp\Client;

test('test image', function () {

    // dd(resolve(ImageGenerator::class));

    $image = resolve(ImageGenerator::class)->generate('cool');
    expect($image)->toBe('Generated image from OpenAi for prompt: cool');
});
