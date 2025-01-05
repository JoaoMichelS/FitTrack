<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\SocialAuthController;

// Rotas públicas
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/password/forgot', [ForgotPasswordController::class, 'sendResetCode']);
Route::post('/password/verify', [ForgotPasswordController::class, 'verifyResetCode']);
Route::post('/password/reset', [ForgotPasswordController::class, 'resetPassword']);

// Rotas protegidas por Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function () {
        return request()->user();
    });
});

/* // routes/web.php ou routes/api.php
Route::prefix('auth')->group(function () {
    // Redireciona para o provedor
    Route::get('redirect/{provider}', [SocialAuthController::class, 'redirect'])
        ->name('social.redirect');

    // Callback do provedor
    Route::get('callback/{provider}', [SocialAuthController::class, 'callback'])
        ->name('social.callback');

    // Logout genérico (se for usar)
    Route::post('logout', [SocialAuthController::class, 'logout'])
        ->name('social.logout');
}); */


