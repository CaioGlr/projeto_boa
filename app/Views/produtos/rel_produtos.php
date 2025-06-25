<div class="content-titulo">
    <header class="text-center">
        <div>
            <h1 class="display-3 fw-bold">Relátorio de Produtos</h1>
        </div>
    </header>

    <div class="container mt-4 box">

        <!-- Botão de Imprimir -->
        <div class="d-flex justify-content-center mb-4">
            <button onclick="window.print()" class="btn btn-dark x-4 py-2 fs-5">
                <i class="fas fa-print"></i> Imprimir Relatório
            </button>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                </tr>
            </thead>
            <tbody id="prodTable">
                <?php foreach ($produtos as $prod): ?>
                    <tr>
                        <td><?= $prod['id_produto'] ?></td>
                        <td><?= $prod['nome'] ?></td>
                        <td><?= $prod['tipo'] ?></td>
                        <td>R$<?= $prod['preco'] ?></td>
                        <td><?= $prod['estoque'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <div class="d-flex justify-content-between">
            <a href="/dashboard" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
        </div>
    </div>
</div>