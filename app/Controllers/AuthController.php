<?php
// Controlador responsável pela autenticação de usuários (login e logout)
// Não precisa iniciar a sessão aqui, pois este arquivo é chamado no index
namespace App\Controllers;

// Importa o modelo de autenticação
use App\Models\Auth;

class AuthController
{
    // Função responsável por realizar o login do usuário
    public function login()
    {
        // Recebe e sanitiza o email enviado pelo formulário
        $usuario = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        // Recebe a senha enviada pelo formulário
        $senha = $_POST['senha'];

        $erros = [];

        // Verifica se o campo de email está vazio
        if (empty($usuario)) {
            $erros[] = 'O campo de email é obrigatório.';
        }

        // Verifica se o campo de senha está vazio
        if (empty($senha)) {
            $erros[] = 'O campo de senha é obrigatório.';
        }

        // Se houver erros, armazena na sessão e redireciona para a tela de login
        if (!empty($erros)) {
            $_SESSION['erros'] = $erros;
            $_SESSION['dados'] = ['email' => $usuario];
            header('Location: /entrar');
            exit;
        }

        // Tenta realizar o login usando o Model Auth
        if (Auth::login($usuario, $senha)) {
            // Se login for bem-sucedido, armazena mensagem de sucesso e redireciona para o dashboard
            $_SESSION['mensagem'] = "Logado com sucesso: {$_SESSION['usuario_nome']} ({$_SESSION['usuario_tipo']})";
            $_SESSION['tipo_mensagem'] = "success";
            header('Location: /dashboard');
            exit;
        } else {
            // Se login falhar, armazena mensagem de erro e redireciona para a tela de login
            $_SESSION['erros'] = ['Usuário e/ou senha inválidos!'];
            $_SESSION['dados'] = ['email' => $usuario];
            header('Location: /entrar');
            exit;
        }
    }

    // Função responsável por realizar o logout do usuário
    public function logout()
    {
        // Remove as variáveis de sessão do usuário
        unset($_SESSION['usuario_id']);
        unset($_SESSION['usuario_nome']);
        unset($_SESSION['usuario_email']);
        unset($_SESSION['usuario_tipo']);

        // Destroi a sessão e inicia uma nova
        session_destroy();
        session_start();

        // Redireciona para a tela de login
        header('Location: /entrar');
        exit;
    }
}