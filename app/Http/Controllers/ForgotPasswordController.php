<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    // Envia o e-mail com o código de recuperação
    public function sendResetCode(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        // Gera um código de 6 dígitos
        $code = rand(100000, 999999);

        // Salva o código na tabela password_reset_tokens
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => $code,
                'created_at' => Carbon::now(),
            ]
        );

        // Envia o e-mail
        Mail::to($request->email)->send(new \App\Mail\ResetPasswordMail($code));

        return response()->json(['message' => 'Código enviado para seu e-mail']);
    }

    // Verifica o código enviado
    public function verifyResetCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required|digits:6',
        ]);

        $reset = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->code)
            ->first();

        if (!$reset || Carbon::parse($reset->created_at)->addMinutes(30)->isPast()) {
            return response()->json(['error' => 'Código inválido ou expirado'], 422);
        }

        return response()->json(['message' => 'Código válido']);
    }

    // Altera a senha após verificação
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required|digits:6',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $reset = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->code)
            ->first();

        if (!$reset) {
            return response()->json(['error' => 'Código inválido'], 422);
        }

        // Altera a senha
        $user = User::where('email', $request->email)->first();
        $user->update(['password' => bcrypt($request->password)]);

        // Remove o código de reset usado
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return response()->json(['message' => 'Senha alterada com sucesso']);
    }
}
