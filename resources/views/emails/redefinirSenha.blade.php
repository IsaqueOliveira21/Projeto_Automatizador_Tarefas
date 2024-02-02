<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Estilos para garantir que o email seja exibido corretamente em diferentes clientes de email */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center; /* Alinha o conteúdo ao centro */
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
            line-height: 1.6;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<div class="container">
    <img src="{{ asset('assets/media/various/logo.png') }}" style="width: 100px; height: 100px; display: block; margin: 0 auto;" alt=""><!-- Adiciona estilos para centralizar a imagem -->
    <h1>Fluid</h1>
    <p>Olá,</p>
    <p>Para redefinir sua senha, clique no botaão abaixo.</p>
    <p>Se precisar de ajuda, não hesite em entrar em contato conosco.</p>
    <a href="{{ url( 'forgotPassword/newPassword', $user->id ) }}" class="button">Redefinir Senha</a>
</div>
</body>
</html>
