<?php

use App\Http\Controllers\Api\ContactusController;
use App\Http\Controllers\Api\NewsletterController;
use Illuminate\Support\Facades\Route;

Route::post('newsletter/subscribe', [NewsletterController::class, 'subscribe'])
    ->name('newsletter.subscribe');

Route::post('newsletter/unsubscribe', [NewsletterController::class, 'unsubscribe'])
    ->name('newsletter.unsubscribe');

Route::post('send_inquiry', [ContactusController::class, 'send'])
    ->name('contactus.send');
