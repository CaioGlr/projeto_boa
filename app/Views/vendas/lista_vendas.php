<!-- Lista de Vendas - Exibe todas as vendas registradas -->

<!-- Cabeçalho da página -->
<div class="content-titulo">
    <header class="text-center">
        <div>
            <h1 class="display-3 fw-bold">Lista de Vendas</h1>
        </div>
    </header>

    <div class="container mt-4 box">
        <!-- Botão para registrar nova venda -->
        <a href="/vendas/novo" class="btn btn-primary mb-3">Registrar uma nova <b>Venda</b></a>

        <!-- Exibe mensagens de sucesso se existirem -->
        <?php
        if (isset($_SESSION['mensagem'])):
        ?>
            <div class="alert alert-<?= $_SESSION['tipo_mensagem'] ?> alert-dismissible fade show" role="alert">
                <strong>Sucesso!</strong> <?= $_SESSION['mensagem'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        endif;
        // Remove as mensagens da sessão após exibi-las
        unset($_SESSION['mensagem']);
        unset($_SESSION['tipo_mensagem']);
        ?>

        <!-- Tabela de vendas -->
        <table class="table table-striped">
            <!-- Cabeçalho da tabela -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuário</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Data do Pagamento</th>
                    <th>Forma de Pagamento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <!-- Corpo da tabela -->
            <tbody id="vendaTable">
                <?php foreach ($vendas as $venda): ?>
                    <tr>
                        <td><?= $venda['id_venda'] ?></td>
                        <td><?= $venda['nome_usuario'] ?></td> <!-- Nome do usuário -->
                        <td><?= $venda['nome_produto'] ?></td> <!-- Nome do produto -->
                        <td><?= $venda['quantidade'] ?></td>
                        <!-- Converte a data para o formato brasileiro -->
                        <td><?= date('d/m/Y', strtotime($venda['data_venda'])) ?></td>
                        <td><?= $venda['forma_pagamento'] ?></td>
                        <td>
                            <!-- Botão de editar -->
                            <a href="/vendas/<?= $venda['id_venda'] ?>/editar" class="btn btn-warning btn-sm">Edit</a>
                            <!-- Botão de deletar fisicamente -->
                            <button class="btn btn-danger btn-sm btn-action"
                                onclick="deletarFisico(<?= $venda['id_venda'] ?>)"
                                title="Excluir" type="button">
                                Deletar
                            </button>
                            <!-- Botão de desativar (deletar logicamente) -->
                            <button class="btn btn-danger btn-sm btn-action"
                                onclick="deletarLogico(<?= $venda['id_venda'] ?>)"
                                title="Excluir" type="button">
                                Desativar
                            </button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        
        <!-- Botão de voltar -->
        <div class="d-flex justify-content-between">
            <a href="/dashboard" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
        </div>
    </div>
</div>

<!-- Scripts JavaScript para as ações de deletar -->
<script>
    // Função para deletar fisicamente uma venda
    function deletarFisico(id) {
        if (confirm("Deseja deletar PERMANENTEMENTE este usuário? Esta ação não poderá ser desfeita!")) {
            window.location.href = `/vendas/${id}/del-fisico`;
        } else {
            alert("Exclusão cancelada!");
        }
    }

    // Função para deletar logicamente uma venda (desativar)
    function deletarLogico(id) {
        if (confirm("Deseja DESATIVAR essa Venda?")) {
            window.location.href = `/vendas/${id}/del-logico`;
        } else {
            alert("Exclusão cancelada!");
        }
    }
</script>