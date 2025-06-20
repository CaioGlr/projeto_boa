<?php
// Não precisa iniciar a sessão, pois este arquivo já é chamado no index.php
namespace App\Controllers;

//Importa o Model para ser utilizado.
use App\Models\Auth;

class AuthController
{
    public function login(){
        $usuario = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $senha = $_POST['senha'];

        $erros = [];
        if(empty($usuario)) {
            $erros[] = 'O campo de email é obrigatório.';
        }
        if(empty($senha)) {
            $erros[] = 'O campo de senha é obrigatório.';
        }

        if(!empty($erros)) {   
            //Envia os erros para a página de cadastro
            $_SESSION['erros'] = $erros;
            // Envia os dados já informados para serem incluidos
            $_SESSION['dados'] = $usuario;
            // Redireciona para a página de cadastro
            header('Location: /entrar');
        }else{
            if(Auth::login($usuario,$senha)){
                header('Location: /dashoard');
            }else{
                $_SESSION['erros'] = ['Usuario e/ou Senha Inválidos!'];
                header('Location: /entrar');
        }
    }
}

        public function logout(){
            unset($_SESSION['usuario_id']);
            unset($_SESSION['usuario_nome']);  
            unset($_SESSION['usuario_email']);
            unset($_SESSION['usuario_tipo']);

            session_destroy();
            session_start();

            header(`location: /entrar`);
        }
        


}
