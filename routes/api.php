<?php

use App\Http\Controllers\Api\AdminAuthController;
use App\Http\Controllers\Api\ApplyController;
use App\Http\Controllers\Api\ContactusController;
use App\Http\Controllers\Api\NewsletterController;
use Illuminate\Support\Facades\Route;

Route::post('newsletter/subscribe', [NewsletterController::class, 'subscribe'])
    ->name('newsletter.subscribe');

Route::post('newsletter/unsubscribe', [NewsletterController::class, 'unsubscribe'])
    ->name('newsletter.unsubscribe');

Route::post('send_inquiry', [ContactusController::class, 'send'])
    ->name('contactus.send');

// Admin Auth Routes
Route::prefix('admin')->group(function () {
    Route::post('register', [AdminAuthController::class, 'register']);
    Route::post('login', [AdminAuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [AdminAuthController::class, 'logout']);
        Route::get('index', [AdminAuthController::class, 'index']); // Show all admins

        Route::get('applies', [ApplyController::class, 'index']);
    });
});

// Apply Routes
Route::post('apply', [ApplyController::class, 'store']);
