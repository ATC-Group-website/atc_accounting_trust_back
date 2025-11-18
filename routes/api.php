<?php

use App\Http\Controllers\Api\NewsletterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('newsletter/subscribe', [NewsletterController::class, 'subscribe'])
    ->name('newsletter.subscribe');

Route::post('newsletter/unsubscribe', [NewsletterController::class, 'unsubscribe'])
    ->name('newsletter.unsubscribe');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
