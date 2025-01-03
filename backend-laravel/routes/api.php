<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordController;

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

