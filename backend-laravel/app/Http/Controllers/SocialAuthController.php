<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class SocialAuthController extends Controller
{
    // Redireciona para o provedor
    public function redirect($provider)
    {
        if ($provider === 'twitter') {
            $provider = 'twitter-oauth2';
        }

        // Ex: google, facebook, twitter
        return Socialite::driver($provider)->redirect();
    }

    // Callback (retorno) do provedor
    public function callback($provider)
    {
        if ($provider === 'twitter') {
            $provider = 'twitter-oauth2';
        }

        try {
            $socialUser = Socialite::driver($provider)->user();

            // Verifica dados do usuário retornado
            $email = $socialUser->getEmail() ?? "{$provider}_{$socialUser->getId()}@example.com";
            $name  = $socialUser->getName()  ?? 'Usuário';

            // Cria ou atualiza o usuário no banco
            $user = User::updateOrCreate(
                [
                    // chave de busca (ex: email ou provider_id)
                    'email' => $email,
                ],
                [
                    'name' => $name,
                    "{$provider}_id"            => $socialUser->getId(),
                    "{$provider}_token"         => $socialUser->token,
                    "{$provider}_refresh_token" => $socialUser->refreshToken ?? null,
                    'password'                  => bcrypt(Str::random(16)),
                ]
            );

            // Gera token Sanctum (ou JWT)
            $token = $user->createToken('auth_token')->plainTextToken;

            // Faz login
            Auth::login($user);

            // Redireciona de volta ao front-end com o token
            return redirect()->away(env('FRONTEND_URL') . "/social-login?token={$token}");
        } catch (\Exception $e) {
            return redirect()->away(env('FRONTEND_URL') . "/login?error=" . $e->getMessage());
        }
    }

    // Exemplo de logout genérico
    public function logout(Request $request)
    {
        // Exemplo: revogar tokens Sanctum
        $request->user()->tokens()->delete();

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logout realizado com sucesso']);
    }
}
