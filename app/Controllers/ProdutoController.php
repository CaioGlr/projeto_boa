<?php
// Controlador responsável pelas operações de produtos (CRUD)
// Não precisa iniciar a sessão, pois este arquivo já é chamado no index.php
namespace App\Controllers;

//Importa o Model para ser utilizado.
use App\Models\Produto;

class ProdutoController
{
    // Exibe a lista de produtos
    public function listar()
    {
        // Busca todos os produtos no banco de dados
        $produtos = Produto::buscarTodos();

        // Renderiza a view de listagem, passando os produtos
        render('produtos/lista_produtos.php', [
            'title' => 'Listagem de Produtos - Comida Boa',
            'produtos' => $produtos
        ]);
    }

    // Exibe o relatório de produtos
    public function relatorio()
    {
        // Busca todos os produtos no banco de dados
        $produtos = Produto::buscarTodos();

        // Renderiza a view de relatório, passando os produtos
        render('produtos/rel_produtos.php', [
            'title' => 'Relatório de Produtos - Comida Boa',
            'produtos' => $produtos
        ]);
    }

    // Abre o formulário para criar um novo produto
    public function novo()
    {
        render('produtos/form_produtos.php', ['title' => 'Cadastro de Produtos - Comida Boa']);
    }

    // Salva um novo produto no banco de dados
    public function salvar()
    {
        // Sanitiza os dados recebidos do formulário
        $dados = [
            'nome' => filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS),
            'preco' => filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_SPECIAL_CHARS),
            'tipo' => filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS),
            'estoque' => filter_input(INPUT_POST, 'estoque', FILTER_SANITIZE_NUMBER_INT)
        ];

        // Valida os dados do formulário
        $erros = $this->validar($dados);

        if (!empty($erros)) {
            // Se houver erros, armazena na sessão e redireciona para o formulário
            $_SESSION['erros'] = $erros;
            $_SESSION['dados'] = $dados;
            header('Location: /produtos/novo');
        } else {
            // Salva o produto no banco de dados
            Produto::salvar($dados);
            $_SESSION['mensagem'] = "O Produto " . $dados['nome'] . ", foi cadastrado com sucesso!";
            $_SESSION['tipo_mensagem'] = "success";
            header('Location: /produtos');
        }
    }

    // Abre o formulário para editar um produto existente
    public function editar($id)
    {
        // Busca os dados do produto pelo ID
        $dados = Produto::BuscarUm($id);
        render('produtos/form_produtos.php', [
            'title' => 'Alterar Produto - Comida Boa',
            'dados' => $dados
        ]);
    }

    // Atualiza um produto existente no banco de dados
    public function atualizar($id)
    {
        // Sanitiza os dados recebidos do formulário
        $dados = [
            'nome' => filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS),
            'preco' => filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_SPECIAL_CHARS),
            'tipo' => filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS),
            'estoque' => filter_input(INPUT_POST, 'estoque', FILTER_SANITIZE_NUMBER_INT)
        ];

        // Valida os dados do formulário
        $erros = $this->validar($dados);

        if (!empty($erros)) {
            // Se houver erros, armazena na sessão e redireciona para o formulário de edição
            $_SESSION['erros'] = $erros;
            $_SESSION['dados'] = $dados;
            header('Location: /produtos/' . $id . '/editar');
        } else {
            // Adiciona o ID do produto para atualização
            $dados['id_produto'] = $id;
            // Atualiza o produto no banco de dados
            Produto::atualizar($dados);
            $_SESSION['mensagem'] = "O Produto " . $dados['nome'] . ", foi atualizado com sucesso!";
            $_SESSION['tipo_mensagem'] = "success";
            header('Location: /produtos');
        }
    }

    // Exclusão lógica do produto (marca como deletado)
    public function deleteLogico($id)
    {
        Produto::deletarLogico($id);
        header('Location: /produtos');
    }

    // Exclusão física do produto (remove do banco de dados)
    public function deleteFisico($id)
    {
        Produto::deletarFisico($id);
        header('Location: /produtos');
    }

    // Valida e sanitiza os dados do formulário de produto
    public function validar($dados)
    {
        $erros = [];

        // Validação do nome
        // strlen é usado para verificar o tamanho da string
        // empty verifica se a variável está vazia
        if (empty($dados['nome'])) {
            $erros[] = "O nome é obrigatório!";
        } else if (strlen($dados['nome']) < 3) {
            $erros[] = "O nome deve ter pelo menos 3 caracteres!";
        }
        // Validação do preço
        // !is_numeric é usado para verificar se o valor é um número
        // e <= 0 para garantir que o preço seja positivo
        if (empty($dados['preco'])) {
            $erros[] = "O preço é obrigatório!";
        } else if (!is_numeric($dados['preco']) || $dados['preco'] <= 0) {
            $erros[] = "O preço deve ser um número positivo!";
        }
        // Validação do tipo
        // ! é operador de negação logica, ele verifica se a variável está vazia
        // in_array verifica se o tipo está entre os tipos válidos
        if (empty($dados['tipo'])) {
            $erros[] = "O tipo do produto é obrigatório!";
        } else if (!in_array($dados['tipo'], ['Café da Manhã', 'Almoço', 'Janta', 'Bebida', 'Sobremesa', 'Salgados'])) {
            $erros[] = "O tipo do produto é inválido!";
        }
        // Validação do estoque
        // !is_numeric é usado para verificar se o valor é um número
        // e <= 0 para garantir que o estoque seja um número positivo
        if (empty($dados['estoque'])) {
            $erros[] = "A quantidade em estoque é obrigatório!";
        } else if (!is_numeric($dados['estoque']) || $dados['estoque'] <= 0) {
            $erros[] = "A quantidade em estoque deve ser maior que zero!";
        }

        return $erros;
    }
}
