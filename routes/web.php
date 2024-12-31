<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\SocialAuthController;

Route::get('/', function () {
    /* return view('welcome'); */
});

// Redireciona para o Google
Route::get('/auth/google', [SocialAuthController::class, 'redirect']);

// Callback (resposta do Google)
Route::get('/auth/google/callback', [SocialAuthController::class, 'callback']);

Route::post('/auth/google/logout', [SocialAuthController::class, 'logout'])->middleware('auth:sanctum');
