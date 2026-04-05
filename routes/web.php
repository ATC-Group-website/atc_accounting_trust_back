<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayingController;

Route::get('/', function () {
    return view('welcome');
});

// Playing
Route::get('playing', [PlayingController::class, 'playing']);
