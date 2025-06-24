<?php
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
        $vendas = Venda::buscarTodos();
        render('vendas/lista_vendas.php', [
            'title' => 'Listagem de Vendas - Comida Boa',
            'vendas' => $vendas
        ]);
    }

    // Exibe o relatório de vendas
    public function relatorio()
    {
        $vendas = Venda::buscarTodos();
        render('vendas/rel_vendas.php', [
            'title' => 'Relatório de Vendas - Comida Boa',
            'vendas' => $vendas
        ]);
    }

    // Abre o formulário para criar uma nova venda
    public function novo()
    {
        // Busca todos os usuários e produtos para preencher os campos do formulário
        // Isso permite que o usuário selecione um produto e um usuário ao registrar uma venda
        $usuarios = Usuario::buscarTodos();
        $produtos = Produto::buscarTodos();

        render('vendas/form_vendas.php', [
            'title' => 'Registro de Vendas - Comida Boa',
            // Passa os usuários e produtos para a view do formulário
            'usuarios' => $usuarios,
            'produtos' => $produtos
        ]);
    }

    // Salva uma nova venda no banco de dados
    public function salvar()
    {
        $dados = [
            // Sanitiza os dados recebidos do formulário para evitar injeção de código
            'produto_id' => filter_input(INPUT_POST, 'produto_id', FILTER_SANITIZE_SPECIAL_CHARS),
            'quantidade' => filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_SPECIAL_CHARS),
            'data_venda' => filter_input(INPUT_POST, 'data_venda', FILTER_SANITIZE_SPECIAL_CHARS),
            'usuario_id' => filter_input(INPUT_POST, 'usuario_id', FILTER_SANITIZE_SPECIAL_CHARS),
            'forma_pagamento' => filter_input(INPUT_POST, 'forma_pagamento', FILTER_SANITIZE_SPECIAL_CHARS),
        ];

        // Valida os dados da venda
        $erros = $this->validar($dados);

        // Se houver erros, armazena-os na sessão e redireciona para o formulário de nova venda
        // Isso permite que o usuário veja os erros e corrija os dados antes de tentar novamente
        if (!empty($erros)) {
            $_SESSION['erros'] = $erros;
            $_SESSION['dados'] = $dados;
            header('Location: /vendas/novo');
        } else {
            // Se não houver erros, chama o método salvar da classe Venda para registrar a venda no banco de dados
            Venda::salvar($dados);
            $_SESSION['mensagem'] = "Venda registrada com sucesso!";
            $_SESSION['tipo_mensagem'] = "success";
            header('Location: /vendas');
        }
    }

    // Edita uma venda existente
    public function editar($id)
    {
        $dados = Venda::buscarUm($id);
        $usuarios = Usuario::buscarTodos();
        $produtos = Produto::buscarTodos();

        render("vendas/form_vendas.php", [
            'title' => 'Alterar Vendas - Comida Boa',
            // Passa os dados da venda, usuários e produtos para a view
            'dados' => $dados,
            // Passa os usuários e produtos para a view do formulário
            'usuarios' => $usuarios,
            'produtos' => $produtos
        ]);
    }

    // Atualiza uma venda existente
    public function atualizar($id)
    {
        $dados = [
            'produto_id' => filter_input(INPUT_POST, 'produto_id', FILTER_SANITIZE_SPECIAL_CHARS),
            'quantidade' => filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_SPECIAL_CHARS),
            'data_venda' => filter_input(INPUT_POST, 'data_venda', FILTER_SANITIZE_SPECIAL_CHARS),
            'usuario_id' => filter_input(INPUT_POST, 'usuario_id', FILTER_SANITIZE_SPECIAL_CHARS),
            'forma_pagamento' => filter_input(INPUT_POST, 'forma_pagamento', FILTER_SANITIZE_SPECIAL_CHARS),

            'id_venda' => $id
        ];

        $erros = $this->validar($dados);

        if (!empty($erros)) {
            $_SESSION['erros'] = $erros;
            $_SESSION['dados'] = $dados;
            header('Location: /vendas/' . $id . '/editar');
        } else {
            Venda::atualizar($dados);
            $_SESSION['mensagem'] = "Venda alterada com sucesso!";
            $_SESSION['tipo_mensagem'] = "success";
            header('Location: /vendas');
        }
    }

    // Exclusão lógica de uma venda
    public function deleteLogico($id)
    {
        Venda::deletarLogico($id);
        header('Location: /vendas');
    }

    // Exclusão física de uma venda
    public function deleteFisico($id)
    {
        Venda::deletarFisico($id);
        header('Location: /vendas');
    }

    // Valida os dados recebidos do formulário de venda
    public function validar($dados)
    {
        $erros = [];

        if (empty($dados['usuario_id'])) {
            $erros[] = "O usuário é obrigatório.";
        }

        if (empty($dados['produto_id'])) {
            $erros[] = "O produto é obrigatório.";
        }

        if (empty($dados['quantidade']) || $dados['quantidade'] < 1) {
            $erros[] = "A quantidade deve ser maior que zero.";
        }

        if (empty($dados['data_venda'])) {
            $erros[] = "A data da venda é obrigatória.";
        }

        if (empty($dados['forma_pagamento']) || !in_array($dados['forma_pagamento'], ['Pix', 'Dinheiro', 'Débito', 'Crédito', 'Transferência'])) {
            $erros[] = "A forma de pagamento é inválida.";
        }

        return $erros;
    }
}
