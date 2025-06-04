<div class="content-titulo">
    <header class="text-center">
        <div>
            <h1 class="display-3 fw-bold">Listagem de Produtos</h1>
        </div>
    </header>

    <div class="container mt-4 box">
        <input type="text" id="search" class="form-control mb-3" placeholder="Pesquisar produto...">

        <?php
         if (isset($_SESSION['mensagem'])):
        ?>
            <div class="alert alert-<?= $_SESSION['tipo_mensagem'] ?> alert-dismissible fade show" role="alert">
                <strong>Sucesso!</strong> <?= $_SESSION['mensagem'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php 
            endif;
            unset($_SESSION['mensagem']);
            unset($_SESSION['tipo_mensagem']); 
        ?>

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
                    <th>Preço em Reais</th>
                    <th>Estoque</th>
                </tr>
            </thead>
            <tbody id="userTable">
                <?php foreach ($produtos as $user): ?>
                    <tr>
                        <td><?= $user['id_produto'] ?></td>
                        <td><?= $user['nome'] ?></td>
                        <td><?= $user['tipo'] ?></td>
                        <td><?= $user['preco'] ?></td>
                        <td><?= $user['estoque'] ?></td>
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