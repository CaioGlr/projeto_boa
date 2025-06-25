<!-- Lista de Produtos - Exibe todos os produtos cadastrados -->

<!-- Cabeçalho da página -->
<div class="content-titulo">
    <header class="text-center">
        <div>
            <h1 class="display-3 fw-bold">Listagem de Produtos</h1>
        </div>
    </header>

    <div class="container mt-4 box">
        <!-- Botão para cadastrar novo produto -->
        <a href="/produtos/novo" class="btn btn-primary mb-3">Cadastrar um <b>Novo Produto</b></a>

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

        <!-- Tabela de produtos -->
        <table class="table table-striped">
            <!-- Cabeçalho da tabela -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <!-- Corpo da tabela -->
            <tbody id="prodTable">
                <?php foreach ($produtos as $prod): ?>
                    <tr>
                        <td><?= $prod['id_produto'] ?></td>
                        <td><?= $prod['nome'] ?></td>
                        <td><?= $prod['tipo'] ?></td>
                        <td>R$<?= $prod['preco'] ?></td>
                        <td><?= $prod['estoque'] ?></td>
                        <td>
                            <!-- Botão de editar -->
                            <a href="/produtos/<?= $prod['id_produto'] ?>/editar" class="btn btn-warning btn-sm">Edit</a>
                            <!-- Botão de deletar fisicamente -->
                            <button class="btn btn-danger btn-sm btn-action"
                                onclick="deletarFisico(<?= $prod['id_produto'] ?>)"
                                title="Excluir" type="button">
                                Deletar
                            </button>
                            <!-- Botão de desativar (deletar logicamente) -->
                            <button class="btn btn-danger btn-sm btn-action"
                                onclick="deletarLogico(<?= $prod['id_produto'] ?>)"
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
            <a href="/dashboard" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
        </div>
    </div>
</div>

<!-- Scripts JavaScript para as ações de deletar -->
<script>
    // Função para deletar fisicamente um produto
    function deletarFisico(id) {
        if (confirm("Deseja deletar PERMANENTEMENTE este Produto? Esta ação não poderá ser desfeita!")) {
            window.location.href = `/produtos/${id}/del-fisico`;
        } else {
            alert("Exclusão cancelada!");
        }
    }

    // Função para deletar logicamente um produto (desativar)
    function deletarLogico(id) {
        if (confirm("Deseja DESATIVAR este Produto?")) {
            window.location.href = `/produtos/${id}/del-logico`;
        } else {
            alert("Exclusão cancelada!");
        }
    }
</script>