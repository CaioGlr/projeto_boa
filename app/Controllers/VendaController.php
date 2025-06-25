<?php
// Controlador responsável pelas operações de vendas (CRUD)
// Não precisa iniciar a sessão, pois este arquivo já é chamado no index.php
namespace App\Controllers;

// Importa os Models necessários
use App\Models\Venda; // Classe Venda para gerenciar as vendas
use App\Models\Usuario; // Classe Usuario para gerenciar os usuários
use App\Models\Produto; // Classe Produto para gerenciar os produtos

// Classe VendaController para gerenciar as operações relacionadas a vendas
class VendaController
{
    // Exibe a lista de vendas
    public function listar()
    {
        // Busca todas as vendas no banco de dados
        $vendas = Venda::buscarTodos();
        // Renderiza a view de listagem, passando as vendas
        render('vendas/lista_vendas.php', [
            'title' => 'Listagem de Vendas - Comida Boa',
            'vendas' => $vendas
        ]);
    }

    // Exibe o relatório de vendas
    public function relatorio()
    {
        // Busca todas as vendas no banco de dados
        $vendas = Venda::buscarTodos();
        // Renderiza a view de relatório, passando as vendas
        render('vendas/rel_vendas.php', [
            'title' => 'Relatório de Vendas - Comida Boa',
            'vendas' => $vendas
        ]);
    }

    // Abre o formulário para criar uma nova venda
    public function novo()
    {
        // Busca todos os usuários e produtos para preencher os campos do formulário
        $usuarios = Usuario::buscarTodos();
        $produtos = Produto::buscarTodos();

        // Renderiza a view do formulário de venda, passando usuários e produtos
        render('vendas/form_vendas.php', [
            'title' => 'Registro de Vendas - Comida Boa',
            'usuarios' => $usuarios,
            'produtos' => $produtos
        ]);
    }

    // Salva uma nova venda no banco de dados
    public function salvar()
    {
        // Sanitiza os dados recebidos do formulário
        $dados = [
            'produto_id' => filter_input(INPUT_POST, 'produto_id', FILTER_SANITIZE_SPECIAL_CHARS),
            'quantidade' => filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_SPECIAL_CHARS),
            'data_venda' => filter_input(INPUT_POST, 'data_venda', FILTER_SANITIZE_SPECIAL_CHARS),
            'usuario_id' => filter_input(INPUT_POST, 'usuario_id', FILTER_SANITIZE_SPECIAL_CHARS),
            'forma_pagamento' => filter_input(INPUT_POST, 'forma_pagamento', FILTER_SANITIZE_SPECIAL_CHARS),
        ];

        // Valida os dados da venda
        $erros = $this->validar($dados);

        // Se houver erros, armazena-os na sessão e redireciona para o formulário de nova venda
        if (!empty($erros)) {
            $_SESSION['erros'] = $erros;
            $_SESSION['dados'] = $dados;
            header('Location: /vendas/novo');
        } else {
            // Se não houver erros, salva a venda no banco de dados
            Venda::salvar($dados);
            $_SESSION['mensagem'] = "Venda registrada com sucesso!";
            $_SESSION['tipo_mensagem'] = "success";
            header('Location: /vendas');
        }
    }

    // Abre o formulário para editar uma venda existente
    public function editar($id)
    {
        // Busca os dados da venda pelo ID
        $dados = Venda::buscarUm($id);
        // Busca todos os usuários e produtos para preencher os campos do formulário
        $usuarios = Usuario::buscarTodos();
        $produtos = Produto::buscarTodos();

        // Renderiza a view do formulário de venda, passando os dados da venda, usuários e produtos
        render("vendas/form_vendas.php", [
            'title' => 'Alterar Vendas - Comida Boa',
            'dados' => $dados,
            'usuarios' => $usuarios,
            'produtos' => $produtos
        ]);
    }

    // Atualiza uma venda existente no banco de dados
    public function atualizar($id)
    {
        // Sanitiza os dados recebidos do formulário
        $dados = [
            'produto_id' => filter_input(INPUT_POST, 'produto_id', FILTER_SANITIZE_SPECIAL_CHARS),
            'quantidade' => filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_SPECIAL_CHARS),
            'data_venda' => filter_input(INPUT_POST, 'data_venda', FILTER_SANITIZE_SPECIAL_CHARS),
            'usuario_id' => filter_input(INPUT_POST, 'usuario_id', FILTER_SANITIZE_SPECIAL_CHARS),
            'forma_pagamento' => filter_input(INPUT_POST, 'forma_pagamento', FILTER_SANITIZE_SPECIAL_CHARS),
            'id_venda' => $id
        ];

        // Valida os dados da venda
        $erros = $this->validar($dados);

        if (!empty($erros)) {
            // Se houver erros, armazena-os na sessão e redireciona para o formulário de edição
            $_SESSION['erros'] = $erros;
            $_SESSION['dados'] = $dados;
            header('Location: /vendas/' . $id . '/editar');
        } else {
            // Se não houver erros, atualiza a venda no banco de dados
            Venda::atualizar($dados);
            $_SESSION['mensagem'] = "Venda alterada com sucesso!";
            $_SESSION['tipo_mensagem'] = "success";
            header('Location: /vendas');
        }
    }

    // Exclusão lógica de uma venda (marca como deletada)
    public function deleteLogico($id)
    {
        Venda::deletarLogico($id);
        header('Location: /vendas');
    }

    // Exclusão física de uma venda (remove do banco de dados)
    public function deleteFisico($id)
    {
        Venda::deletarFisico($id);
        header('Location: /vendas');
    }

    // Valida os dados recebidos do formulário de venda
    public function validar($dados)
    {
        $erros = [];

        // Validação do usuário
        // Verifica se o usuário_id está vazio, se sim, adiciona um erro
        if (empty($dados['usuario_id'])) {
            $erros[] = "O usuário é obrigatório.";
        }
        // Validação do produto
        // Verifica se o produto_id está vazio, se sim, adiciona um erro
        if (empty($dados['produto_id'])) {
            $erros[] = "O produto é obrigatório.";
        }
        // Validação da quantidade
        // Verifica se a quantidade está vazia ou é menor que 1, se sim, adiciona um erro
        if (empty($dados['quantidade']) || $dados['quantidade'] < 1) {
            $erros[] = "A quantidade deve ser maior que zero.";
        }
        // Validação da data da venda
        // Verifica se a data da venda está vazia, se sim, adiciona um erro
        if (empty($dados['data_venda'])) {
            $erros[] = "A data da venda é obrigatória.";
        }
        // Validação da forma de pagamento
        // ! é operador de negação logica, verifica se a variável está vazia
        // Se a forma de pagamento não for uma das opções válidas, adiciona um erro
        if (empty($dados['forma_pagamento']) || !in_array($dados['forma_pagamento'], ['Pix', 'Dinheiro', 'Débito', 'Crédito'])) {
            $erros[] = "A forma de pagamento é inválida.";
        }

        return $erros;
    }
}
