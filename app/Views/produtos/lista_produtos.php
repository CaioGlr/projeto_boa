<div class="content-titulo">
    <header class="text-center">
        <div>
            <h1 class="display-3 fw-bold">Listagem de Produtos</h1>
        </div>
    </header>

    <div class="container mt-4 box">
        <input type="text" id="search" class="form-control mb-3" placeholder="Pesquisar produto...">
        <a href="/produtos/novo" class="btn btn-primary mb-3">Cadastrar um <b>Novo Produto</b></a>

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

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Preço em Reais</th>
                    <th>Estoque</th>
                    <th>Ações</th>
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
                        <td>
                            <a href="/produtos/<?= $user['id_produto'] ?>/editar" class="btn btn-warning btn-sm">Editar</a>
                            <button class="btn btn-danger btn-sm btn-action"
                                    onclick="deletarFisico(<?= $user['id_produto'] ?>)"
                                    title="Excluir" type="button">
                                Excluir Físico
                            </button>
                            <button class="btn btn-danger btn-sm btn-action"
                                    onclick="deletarLogico(<?= $user['id_produto'] ?>)"
                                    title="Excluir" type="button">
                                Excluir Lógico
                            </button>
                        </td>
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
    function deletarFisico(id) {
        if (confirm("Deseja deletar PERMANENTEMENTE este Produto? Esta ação não poderá ser desfeita!")) {
            window.location.href = `/produtos/${id}/del-fisico`;
        } else {
            alert("Exclusão cancelada!");
        }
    }

    function deletarLogico(id) {
        if (confirm("Deseja DESATIVAR este Produto? Esta ação poderá ser desfeita!")) {
            window.location.href = `/produtos/${id}/del-logico`;
        } else {
            alert("Exclusão cancelada!");
        }
    }

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
</script>
