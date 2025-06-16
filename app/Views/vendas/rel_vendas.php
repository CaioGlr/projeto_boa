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

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuário</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Valor Unitário</th>
                    <th>Valor Total</th>
                    <th>Data da Venda</th>
                    <th>Forma de Pagamento</th>
                </tr>
            </thead>
            <tbody id="vendaTable">
                <?php foreach ($vendas as $venda): ?>
                    <tr>
                        <td><?= $venda['id_venda'] ?></td>
                        <td><?= htmlspecialchars($venda['nome_usuario']) ?></td>
                        <td><?= htmlspecialchars($venda['nome_produto']) ?></td>
                        <td><?= $venda['quantidade'] ?></td>
                        <td>R$<?= number_format($venda['preco_produto'], 2, ',', '.') ?></td>
                        <td>R$<?= number_format($venda['total'], 2, ',', '.') ?></td>
                        <td><?= date('d/m/Y', strtotime($venda['data_venda'])) ?></td>
                        <td><?= htmlspecialchars($venda['forma_pagamento']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="d-flex justify-content-between">
            <a href="/dashboard" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
        </div>
    </div>
</div>

<script>
    // Filtro de busca (por nome de usuário)
    document.getElementById("search")?.addEventListener("keyup", function () {
        const filtro = this.value.toLowerCase();
        document.querySelectorAll("#userTable tr").forEach(function (linha) {
            const usuario = linha.querySelector("td:nth-child(1)").textContent.toLowerCase();
            linha.style.display = usuario.includes(filtro) ? "" : "none";
        });
    });
</script>
