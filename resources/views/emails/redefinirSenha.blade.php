<x-mail::message>
    # Introduction

    ## Redefinir Senha

    Para redefinir sua senha, basta clicar no botão abaixo!

    Caso não tenha solicitado a redefinição de senha, basta apenas desconsiderar este e-mail.

    <x-mail::button :url="url( 'forgotPassword/newPassword', $user->id )">
        Redefinir Senha
    </x-mail::button>

    Atenciosamente,<br>
    Equipe Autotask.
</x-mail::message>
