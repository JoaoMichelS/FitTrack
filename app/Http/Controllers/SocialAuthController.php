<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SocialAuthController extends Controller
{


    public function redirect()
    {
        $user = Auth::user();

        // Verifica se o usuário já tem um Google Token válido
        if ($user && $user->google_token) {
            $response = Http::get('https://www.googleapis.com/oauth2/v3/tokeninfo', [
                'access_token' => $user->google_token
            ]);

            if ($response->successful()) {
                // Se o token é válido, autentica diretamente e redireciona
                Auth::login($user);
                return redirect('/dashboard');
            } else {
                // Se o token não é válido, força o login via Google
                return Socialite::driver('google')->redirect();
            }
        }

        // Caso não haja token, inicia o processo normal
        return Socialite::driver('google')->redirect();
    }

    // Lida com o callback do Google
    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Procura o usuário ou cria um novo
            $user = User::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt(Str::random(16)), // Senha aleatória
                    'google_token' => $googleUser->token,  // Salva o token do Google
                    'google_refresh_token' => $googleUser->refreshToken ?? null // Salva o refresh token (opcional)
                ]
            );

            // Gera um token Sanctum
            $token = $user->createToken('auth_token')->plainTextToken;

            // Login e redireciona
            Auth::login($user);

            return redirect('/dashboard')->with('token', $token);
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Falha ao autenticar com o Google');
        }
    }

    // Logout
    public function logout(Request $request)
    {
        // Revogar token Google (opcional)
        $googleToken = $request->user()->google_token ?? null;

        if ($googleToken) {
            Http::asForm()->post('https://oauth2.googleapis.com/revoke', [
                'token' => $googleToken,
            ]);
        }

        // Revoga todos os tokens Sanctum
        $request->user()->tokens()->delete();

        // Faz logout
        Auth::logout();

        // Invalida a sessão
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logout realizado com sucesso');
    }
}
