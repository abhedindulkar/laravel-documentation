<?php

use App\Http\Controllers\Settings\PasswordController;
use App\Http\Controllers\Settings\TestController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware('auth')->group(function () {
    Route::get('test', [TestController::class, 'test'])->name('test');
});