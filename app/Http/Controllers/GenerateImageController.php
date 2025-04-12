<?php

namespace App\Http\Controllers;

use App\Services\ImageGenerator;

class GenerateImageController extends Controller
{
    public function __construct(public ImageGenerator $imageGenerator){}

    public function __invoke()
    {
        return view('generate', [
            'image' => $this->imageGenerator->generate('A beautiful sunset over the hills'),
        ]);
    }
}
