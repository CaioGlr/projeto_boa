<?php
// Não precisa iniciar a sessão, pois este arquivo já é chamado no index.php
namespace App\Controllers;

//Importa o Model para ser utilizado.
use App\Models\Usuario;

class UsuarioController{

    //Exibe a lista de usuarios
    public function listar(){
        //Chama a Model de Usuario e executa a busca no BD
        $usuarios = Usuario::buscarTodos();

        //Exibe o arquivo PHP de lista enviando os usuarios do BD para apresentação.
        render("usuarios/listagemusuarios.php", [
            'title' => 'Listagem de Usuários - Comida Boa',
            "usuarios" => $usuarios]);
    }

    //Abre o formulário para criar um usuario
     public function novo(){
        render('usuarios/formulario.php', ['title' => 'Cadastro de Usuários - Comida Boa']);
    }
    
    //salva um novo usuario no BD
    public function salvar(){
    
        // 1. Sanatização (Remove tudo que não for texto puro, evita golpes)
        $dados = [
            'nome' => filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS),
            'cpf' => filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS),
            'data_nascimento' => $_POST['data_nascimento'] ?? '',
            'celular' => filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_SPECIAL_CHARS),
            'rua' => filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_SPECIAL_CHARS),
            'numero' => filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_SPECIAL_CHARS),
            'complemento' => filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_SPECIAL_CHARS),
            'bairro' => filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_SPECIAL_CHARS),
            'cidade' => filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS),
            'cep' => filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_SPECIAL_CHARS),
            'estado' => filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_SPECIAL_CHARS),
            'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
            'tipo' => filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS),
            'senha' => $_POST['senha'] ?? null,
            'confirmar_senha' => $_POST['confirmar_senha'] ?? null
        ];
          

        //print_r($_POST);exit();
        //Aqui vamos fazer validações
        $erros = $this->validar($dados);

        if(!empty($erros)) {   
            //Envia os erros para a página de cadastro
            $_SESSION['erros'] = $erros;
            // Envia os dados já informados para serem incluidos
            $_SESSION['dados'] = $dados;
            // Redireciona para a página de cadastro
            header('Location: /usuarios/novo');
        }else{
        
        //chama o model passando os dados
        Usuario::salvar($dados);
         $_SESSION['mensagem'] = "Usuário " . $dados['nome'] . ", cadastrado com sucesso!";
         $_SESSION['tipo_mensagem'] = "success";
        header('Location: /usuarios');
        }

    }

    // Implementa a validação e sanitização dos dados do form (limpeza de segurança)
     public function validar($dados){
        $erros = [];

        //Validação do nome
    if(empty($dados['nome'])){
       $erros[] = "O nome é obrigatório!";
     } else if (strlen($dados['nome']) < 3){
       $erros[] = "O nome deve ter pelo menos 3 caracteres!";
     }
     // Validação da Senha
    if(empty($dados['senha'])){
       $erros[] = "A senha é obrigatório!";
     } else if (strlen($dados['senha']) < 6){
       $erros[] = "A senha deve ter pelo menos 6 caracteres!";
     }
        // Validação do Email
    if(empty($dados['email'])){
       $erros[] = "O email é obrigatório!";
     } else if (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)){
       $erros[] = "E-mail informado é inválido!";
     }
     
     // Validação do Tipo
     if(empty($dados['tipo'])){
        $erros[] = "O Tipo do Usuário é obrigatório!";
     } else if (!in_array($dados['tipo'], ['Administrador', 'Funcionario', 'Cliente'])){
        $erros[] = "O Tipo do Usuário é Inválido!";
     }

     //Outras validações

     // Validação do CPF se é valido de acordo com o calculo
     // Validar se o CPF já foi cadastrado (Busca no BD)
     // Validar se o Email já foi cadastrado (Busca no BD)

     // Validação da Senha se é igual a confirmação
    if(empty($dados['senha']) || empty($dados['confirmar_senha'])) {
        $erros[] = "A senha e a confirmação de senha são obrigatórias!";
    } else if ($dados['senha'] !== $dados['confirmar_senha']) {
        $erros[] = "A Senha e Confirmação de Senha deve ser iguais!";
    }    
        return $erros;
     }
}