<div class="content-titulo">
    <header class="text-center">
        <div>
            <h1 class="display-3 fw-bold">Relátorio das Vendas</h1>
        </div>
    </header>
        <!-- Filtro de busca -->
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
                    <th>ID do Usuário</th>
                    <th>ID do Produto</th>
                    <th>Quantidade Vendida</th>
                    <th>Data do Pagamento</th>
                    <th>Forma de Pagamento</th>
                </tr>
            </thead>
            <tbody id="userTable">
                <?php foreach ($vendas as $user): ?>
                    <tr>
                        <td><?= $user['id_usuario'] ?></td>
                        <td><?= $user['id_produto'] ?></td>
                        <td><?= $user['quantidade'] ?></td>
                        <td><?= $user['data_pagamento'] ?></td>
                        <td><?= $user['forma_pagamento_id'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <div class="d-flex justify-content-between">
            <a href="/dashboard" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
        </div>
    </div>
</div>

<script>
     // Filtro de busca
    document.getElementById("search").addEventListener("keyup", function () {
        const filtro = this.value.toLowerCase();
        const linhas = document.querySelectorAll("#userTable tr");

        linhas.forEach(function (linha) {
            const nome = linha.querySelector("td:nth-child(2)").textContent.toLowerCase();
            linha.style.display = nome.includes(filtro) ? "" : "none";
        });
    });
</script>
