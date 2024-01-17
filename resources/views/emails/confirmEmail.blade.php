<x-mail::message>
# Introduction

## Confirmação de E-mail

    Bem vindo ao Autotask {{ $user[0]->name }}!

    Por favor, clique no botão abaixo para confirmar seu e-mail.

<x-mail::button :url="url( 'confirmEmail', $user[0]->id )">
Confirmar
</x-mail::button>

Atenciosamente,<br>
Equipe Autotask.
</x-mail::message>
