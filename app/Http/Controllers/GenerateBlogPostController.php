<?php

namespace App\Http\Controllers;

// use App\Models\AiService;

use App\Services\BlogPostGenerator;

class GenerateBlogPostController extends Controller
{
    public function __construct(public BlogPostGenerator $blogPostGenerator){}

    public function __invoke()
    {
        // dd('test');
        return view('generate-blog', [
            'blog' => $this->blogPostGenerator->generate('A beautiful sunset over the hills'),
        ]);
    }
}
