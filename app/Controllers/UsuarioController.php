<?php
// Controlador responsável pelas operações de usuários (CRUD)
// Não precisa iniciar a sessão, pois este arquivo já é chamado no index.php
namespace App\Controllers;

// Importa o Model de Usuário para ser utilizado
use App\Models\Usuario;

class UsuarioController
{
    // Exibe a lista de usuários
    public function listar()
    {
        // Busca todos os usuários no banco de dados
        $usuarios = Usuario::buscarTodos();

        // Renderiza a view de listagem, passando os usuários
        render("usuarios/lista_usuarios.php", [
            'title' => 'Lista de Usuários - Comida Boa',
            'usuarios' => $usuarios
        ]);
    }

    // Exibe o relatório de usuários
    public function relatorio()
    {
        // Busca todos os usuários no banco de dados
        $usuarios = Usuario::buscarTodos();

        // Renderiza a view de relatório, passando os usuários
        render("usuarios/rel_usuarios.php", [
            'title' => 'Relatório de Usuários - Comida Boa',
            'usuarios' => $usuarios
        ]);
    }

    // Abre o formulário para criar um novo usuário
    public function novo()
    {
        render('usuarios/form_usuarios.php', ['title' => 'Cadastro de Usuários - Comida Boa']);
    }

    // Salva um novo usuário no banco de dados
    public function salvar()
    {
        // Sanitiza os dados recebidos do formulário
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

        // Valida os dados do formulário
        $erros = $this->validar($dados);

        if (!empty($erros)) {
            // Se houver erros, armazena na sessão e redireciona para o formulário
            $_SESSION['erros'] = $erros;
            $_SESSION['dados'] = $dados;
            header('Location: /usuarios/novo');
        } else {
            // Salva o usuário no banco de dados
            Usuario::salvar($dados);
            $_SESSION['mensagem'] = "Usuário: " . $dados['nome'] . ", cadastrado com sucesso!";
            $_SESSION['tipo_mensagem'] = "success";
            header('Location: /usuarios');
        }
    }

    // Abre o formulário para editar um usuário existente
    public function editar($id)
    {
        // Busca os dados do usuário pelo ID
        $dados = Usuario::BuscarUm($id);
        render("usuarios/form_usuarios.php", [
            'title' => 'Alterar Usuário - Comida Boa',
            'dados' => $dados
        ]);
    }

    // Atualiza um usuário existente no banco de dados
    public function atualizar($id)
    {
        // Sanitiza os dados recebidos do formulário
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

        // Valida os dados do formulário
        $erros = $this->validar($dados);

        if (!empty($erros)) {
            // Se houver erros, armazena na sessão e redireciona para o formulário de edição
            $_SESSION['erros'] = $erros;
            $_SESSION['dados'] = $dados;
            header('Location: /usuarios/' . $id . '/editar');
        } else {
            // Adiciona o ID do usuário para atualização
            $dados['id_usuario'] = $id;
            // Atualiza o usuário no banco de dados
            Usuario::atualizar($dados);
            $_SESSION['mensagem'] = "Usuário: " . $dados['nome'] . ", alterado com sucesso!";
            $_SESSION['tipo_mensagem'] = "success";
            header('Location: /usuarios');
        }
    }

    // Exclusão lógica do usuário (marca como deletado)
    public function deleteLogico($id)
    {
        Usuario::deletarLogico($id);
        header('Location: /usuarios');
    }

    // Exclusão física do usuário (remove do banco de dados)
    public function deleteFisico($id)
    {
        Usuario::deletarFisico($id);
        header('Location: /usuarios');
    }

    // Valida e sanitiza os dados do formulário de usuário
    public function validar($dados)
    {
        $erros = [];

        // Validação do nome
        // empty verifica se o nome não está vazio
        // strlen verifica se o nome tem pelo menos 3 caracteres
        if (empty($dados['nome'])) {
            $erros[] = "O nome é obrigatório!";
        } else if (strlen($dados['nome']) < 3) {
            $erros[] = "O nome deve ter pelo menos 3 caracteres!";
        }
        // Validação da senha
        // empty verifica se a senha não está vazia
        // strlen verifica se a senha tem pelo menos 6 caracteres
        if (empty($dados['senha'])) {
            $erros[] = "A senha é obrigatório!";
        } else if (strlen($dados['senha']) < 6) {
            $erros[] = "A senha deve ter pelo menos 6 caracteres!";
        }
        // Validação do email
        // filter_var verifica se o email é válido
        // empty verifica se o email não está vazio
        if (empty($dados['email'])) {
            $erros[] = "O email é obrigatório!";
        } else if (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
            $erros[] = "E-mail informado é inválido!";
        }
        // Validação do tipo de usuário
        // ! é operador de negação logica, verifica se o tipo de usuário é vazio
        // Verifica se o tipo está vazio ou se não é um dos tipos válidos
        if (empty($dados['tipo'])) {
            $erros[] = "O Tipo do Usuário é obrigatório!";
        } else if (!in_array($dados['tipo'], ['Administrador', 'Funcionário', 'Cliente'])) {
            $erros[] = "O Tipo do Usuário é Inválido!";
        }
        // Validação do CPF
        // !empty verifica se o CPF não está vazio
        // strlen verifica se o CPF tem 11 caracteres
        if (empty($dados['cpf'])) {
            $erros[] = "O CPF é obrigatório!";
        } else if (strlen($dados['cpf']) != 11) {
            $erros[] = "Seu CPF deve ter 11 números!";
        }
        // Validação do telefone
        // !empty verifica se o telefone não está vazio
        // strlen verifica se o telefone tem entre 10 e 11 caracteres
        if (empty($dados['celular'])) {
            $erros[] = "O Telefone é obrigatório!";
        } else if (strlen($dados['celular']) < 10 || strlen($dados['celular']) > 11) {
            $erros[] = "O Telefone deve ter entre 10 e 11 números!";
        }
        // Validação da senha e confirmação
        // !== dados['senha'] verifica se os valores são iguais e do mesmo tipo
        // Se a senha ou confirmação estiverem vazias, adiciona erro
        if (empty($dados['senha']) || empty($dados['confirmar_senha'])) {
            $erros[] = "A senha e a confirmação de senha são obrigatórias!";
        } else if ($dados['senha'] !== $dados['confirmar_senha']) {
            $erros[] = "A Senha e Confirmação de Senha deve ser iguais!";
        }
        return $erros;
    }
}
