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


    public function redirectToGoogle()
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
    public function handleGoogleCallback()
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
    public function logoutGoogle(Request $request)
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

    // Redireciona para o Facebook (com verificação de token salvo)
    public function redirectToFacebook()
    {
        $user = Auth::user();

        // Verifica se o usuário já tem um token salvo
        if ($user && $user->facebook_token) {
            // Faz requisição para verificar se o token é válido
            $response = Http::get('https://graph.facebook.com/debug_token', [
                'input_token' => $user->facebook_token,
                'access_token' => env('FACEBOOK_APP_ID') . '|' . env('FACEBOOK_APP_SECRET'),
            ]);

            $result = $response->json();

            // Se o token é válido, autentica diretamente
            if (isset($result['data']['is_valid']) && $result['data']['is_valid']) {
                Auth::login($user);
                return redirect('/dashboard');
            }
        }

        // Caso não tenha token ou o token não seja válido, faz login novamente
        return Socialite::driver('facebook')->redirect();
    }

    // Callback do Facebook
    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();

            // Cria ou atualiza o usuário
            $user = User::updateOrCreate(
                ['email' => 'aguardando verificacao'],
                [
                    'name' => $facebookUser->getName(),
                    'facebook_id' => $facebookUser->getId(),
                    'facebook_token' => $facebookUser->token,
                    'password' => bcrypt(uniqid())  // Senha aleatória
                ]
            );

            // Autentica o usuário
            Auth::login($user);

            return redirect('/dashboard');
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Falha ao autenticar com o Facebook');
        }
    }

    // Logout do Facebook
    public function logoutFacebook(Request $request)
    {
        $facebookToken = $request->user()->facebook_token ?? null;

        if ($facebookToken) {
            Http::post('https://graph.facebook.com/v12.0/me/permissions', [
                'access_token' => $facebookToken,
            ]);
        }

        // Revoga os tokens Sanctum
        $request->user()->tokens()->delete();

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logout realizado com sucesso');
    }
}
