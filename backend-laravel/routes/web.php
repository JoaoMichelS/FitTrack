<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\SocialAuthController;

Route::get('/', function () {
    /* return view('welcome'); */
});

Route::group(['middleware' => ['web']], function () {
    Route::prefix('auth')->group(function () {
        Route::get('redirect/{provider}', [SocialAuthController::class, 'redirect'])->name('social.redirect');
        Route::get('{provider}/callback', [SocialAuthController::class, 'callback'])->name('social.callback');
        Route::post('logout', [SocialAuthController::class, 'logout'])->name('social.logout');
    });
});

/* // Redireciona para o Google
Route::get('/auth/google', [SocialAuthController::class, 'redirectToGoogle']);
// Callback (resposta do Google)
Route::get('/auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);
// Logout do Google
Route::post('/auth/google/logout', [SocialAuthController::class, 'logoutGoogle'])->middleware('auth:sanctum');

// Redireciona para o Facebook
Route::get('/auth/facebook', [SocialAuthController::class, 'redirectToFacebook']);
// Callback (resposta do Facebook)
Route::get('/auth/facebook/callback', [SocialAuthController::class, 'handleFacebookCallback']);
// Logout do Facebook
Route::post('/auth/facebook/logout', [SocialAuthController::class, 'logoutFacebook'])->middleware('auth:sanctum');

// Redireciona para o Twitter
Route::get('/auth/twitter', [SocialAuthController::class, 'redirectToTwitter']);
// Callback de retorno
Route::get('/auth/twitter/callback', [SocialAuthController::class, 'handleTwitterCallback']); */
