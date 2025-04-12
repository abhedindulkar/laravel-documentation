<?php

use App\Enums\Category;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\GenerateImageController;
use App\Http\Controllers\GenerateBlogPostController;
use App\Http\Controllers\SandboxController;
use App\Http\Middleware\testM1;
use App\Http\Middleware\testM2;
use App\Models\User;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/generate', 'GenerateImageController::class')->name('generate');
// Route::get('/generate', function () {
//     return Inertia::render('Generate');
// })->name('generate');

Route::get('/generate-image', GenerateImageController::class)->name('generate-image');
Route::get('/generate-text', GenerateBlogPostController::class)->name('generate-text');
Route::get('/sandbox', [SandboxController::class, 'test'])->name('sandbox');
Route::permanentRedirect('/first', '/sandbox');

Route::view('/view', 'view',  ['imageLink'=> 'https://example.com/image.jpg'])->name('view');

// Route::group(function() {

// Route::middleware()->group(function() {});

// Route::controller([])->middleware([])->group(function() {});

// ->middleware('throttle:10,1') / 'throttle:global'

Route::prefix('prefix')->group(function () {
    Route::get('/user/{id}', function ($id) {
        return Inertia::render('View', ['id' => $id]);
    })->name('user');

    Route::get('/posts/{post}/comments/{comment}', function (string $postId, string $commentId) {
        return $postId . ' ' . $commentId;
    });
});

// Route::get('/users/{user}', function (User $user) {
//     // dump($user);die;
//     return $user->email;
// });

// });

Route::get('/categories/{category}', function(Category $category) {
    return $category->value;
});

// if i want to use try and catch for enum category
Route::get('/categories/{category}', function ($category) {
    try {
        $categoryEnum = Category::from($category); // Convert to enum
        return $categoryEnum->value; // fruits and people only
    } catch (\ValueError $e) {
        // dump($e);die;
        return $e->getMessage();
        abort(404, 'Category not found'); // Handle invalid category
    }
});

Route::fallback(function () {
    return view('fallback');
});

require __DIR__.'/settings.php';
require __DIR__.'/test.php';
