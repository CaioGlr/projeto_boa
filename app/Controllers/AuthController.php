<?php
// Não precisa iniciar a sessão aqui, pois este arquivo é chamado no index
namespace App\Controllers;

// Importa o modelo de autenticação
use App\Models\Auth;

class AuthController
{
    public function login()
    {
        $usuario = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $senha = $_POST['senha'];

        $erros = [];

        if (empty($usuario)) {
            $erros[] = 'O campo de email é obrigatório.';
        }

        if (empty($senha)) {
            $erros[] = 'O campo de senha é obrigatório.';
        }

        if (!empty($erros)) {
            $_SESSION['erros'] = $erros;
            $_SESSION['dados'] = ['email' => $usuario];
            header('Location: /entrar');
            exit;
        }

        if (Auth::login($usuario, $senha)) {
            header('Location: /dashboard');
            exit;
        } else {
            $_SESSION['erros'] = ['Usuário e/ou senha inválidos!'];
            $_SESSION['dados'] = ['email' => $usuario];
            header('Location: /entrar');
            exit;
        }
    }

    public function logout()
    {
        unset($_SESSION['usuario_id']);
        unset($_SESSION['usuario_nome']);
        unset($_SESSION['usuario_email']);
        unset($_SESSION['usuario_tipo']);

        session_destroy();
        session_start();

        header('Location: /entrar');
        exit;
    }
}
