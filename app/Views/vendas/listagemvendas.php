<div class="content-titulo">
    <header class="text-center">
        <div>
            <h1 class="display-3 fw-bold">Listagem de Vendas</h1>
        </div>
<div class="container mt-4 box">
    <input type="text" id="search" class="form-control mb-3" placeholder="Pesquisar usuário...">
    <a href="/vendas/novo" class="btn btn-primary mb-3"> Registrar<b> Vendas</b></a>

<?php
if (isset($_SESSION['mensagem'])):
?>
<div class="alert alert-<?= $_SESSION['tipo_mensagem'] ?>alert-dismissible fade show" role="alert">
  <strong>Sucesso!</strong> <?= $_SESSION['mensagem'] ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif;
unset($_SESSION['mensagem']);
unset($_SESSION['mensagem']); ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Usuário</th>
                <th>ID Produto</th>
                <th>Quantidade</th>
                <th>Data da Venda</th>
                <th>Forma de Pagamento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody id="userTable">
            <!-- foreach percorre a lista recebida e coloca
             cada item da lista &produtos que veio do controller na variavel $user -->
           <?php foreach ($vendas as $user): ?>
            <tr>
                
                <td><?= $user['id_venda']?></td>
                <td><?= $user['id_usuario']?></td>
                <td><?= $user['id_produto']?></td>
                <td><?= $user['quantidade']?></td>
                <td><?= $user['data_venda']?></td>
                <td><?= $user['forma_pagamento_id']?></td>
        
                <td>
                    <a href="/vendas/<?= $user['id_vendas'] ?>/editar"
                     class="btn btn-warning btn-sm">Editar</button>
                    </a>
                    <a href
                        class="btn btn-danger btn-sm">Excluir</button>
                    </a>
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
    </header>
</div>
