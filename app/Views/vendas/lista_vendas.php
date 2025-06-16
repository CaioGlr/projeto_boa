<div class="content-titulo">
    <header class="text-center">
        <div>
            <h1 class="display-3 fw-bold">Listagem de Usuários</h1>
        </div>
    </header>

    <div class="container mt-4 box">
        <input type="text" id="search" class="form-control mb-3" placeholder="Pesquisar venda...">
        <a href="/vendas/novo" class="btn btn-primary mb-3">Registrar uma nova <b>Venda</b></a>

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
                <th>Usuário</th>
                <th>Produto</th>
                <th>Quantidade Vendida</th>
                <th>Data do Pagamento</th>
                <th>Forma de Pagamento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody id="vendaTable">
            <?php foreach ($vendas as $venda): ?>
                <tr>
                    <td><?= $venda['id_venda'] ?></td>
                    <td><?= htmlspecialchars($venda['nome_usuario']) ?></td> <!-- Nome do usuário -->
                    <td><?= htmlspecialchars($venda['nome_produto']) ?></td> <!-- Nome do produto -->
                    <td><?= $venda['quantidade'] ?></td>
                    <!-- strtotime converte a data para o formato d/m/y-->
                    <td><?= date('d/m/Y', strtotime($venda['data_venda'])) ?></td>
                    <td><?= $venda['forma_pagamento'] ?></td>
                    <td>
                        <a href="/vendas/<?= $venda['id_venda'] ?>/editar" class="btn btn-warning btn-sm">Editar</a>
                        <button class="btn btn-danger btn-sm btn-action"
                                onclick="deletarFisico(<?= $venda['id_venda'] ?>)"
                                title="Excluir" type="button">
                            Deletar
                        </button>
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
        <div class="d-flex justify-content-between">
            <a href="/dashboard" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
        </div>
    </div>
</div>

<script>
    function deletarFisico(id) {
        if (confirm("Deseja deletar PERMANENTEMENTE este usuário? Esta ação não poderá ser desfeita!")) {
            window.location.href = `/vendas/${id}/del-fisico`;
        } else {
            alert("Exclusão cancelada!");
        }
    }

    function deletarLogico(id) {
        if (confirm("Deseja DESATIVAR este usuário?")) {
            window.location.href = `/vendas/${id}/del-logico`;
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
