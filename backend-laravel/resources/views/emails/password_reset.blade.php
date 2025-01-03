@component('mail::message')
# Recuperação de Senha

Você solicitou a recuperação de senha.
Seu código de recuperação é:

# {{ $code }}

Este código expira em 30 minutos.

Se você não solicitou essa recuperação, ignore este e-mail.

Atenciosamente,
{{ config('app.name') }}
@endcomponent
