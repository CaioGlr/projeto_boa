<!-- Relatório de Vendas - Exibe todas as vendas para impressão -->

<!-- Cabeçalho da página -->
<div class="content-titulo">
    <header class="text-center">
        <h1 class="display-3 fw-bold">Relatório das Vendas</h1>
    </header>
    <div class="container mt-4 box">

        <!-- Botão de Imprimir -->
        <div class="d-flex justify-content-center mb-4">
            <button onclick="window.print()" class="btn btn-dark px-4 py-2 fs-5">
                <i class="fas fa-print"></i> Imprimir Relatório
            </button>
        </div>

        <!-- Tabela de vendas para o relatório -->
        <table class="table table-striped">
            <!-- Cabeçalho da tabela -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuário</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Data da Venda</th>
                    <th>Forma de Pagamento</th>
                </tr>
            </thead>
            <!-- Corpo da tabela -->
            <tbody id="vendaTable">
                <?php foreach ($vendas as $venda): ?>
                    <tr>
                        <td><?= $venda['id_venda'] ?></td>
                        <td><?= $venda['nome_usuario'] ?></td>
                        <td><?= $venda['nome_produto'] ?></td>
                        <td><?= $venda['quantidade'] ?></td>
                        <!-- Converte a data para o formato brasileiro -->
                        <td><?= date('d/m/Y', strtotime($venda['data_venda'])) ?></td>
                        <td><?= $venda['forma_pagamento'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Botão de voltar -->
        <div class="d-flex justify-content-between">
            <a href="/dashboard" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
        </div>
    </div>
</div>