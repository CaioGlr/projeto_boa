<div class="content-titulo">
    <header class="text-center">
        <div>
            <h1 class="display-3 fw-bold">Listagem de Usuários</h1>
        </div>
<div class="container mt-4 box">
    <input type="text" id="search" class="form-control mb-3" placeholder="Pesquisar usuário...">
    <button class="btn btn-primary mb-3">Adicionar Novo Usuário</button>


    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody id="userTable">
            <!-- foreach percorre a lista recebida e coloca
             cada item da lista &usuarios que veio do controller na variavel $user -->
           <?php foreach ($usuarios as $user): ?>
            <tr>
                
                <td><?= $user['id_usuario']?></td>
                <td><?= $user['nome']?></td>
                <td><?= $user['email']?></td>
                <td><?= $user['celular']?></td>
                <td>
                    <a href="/usuarios/<?= $user['id_usuario'] ?>/editar"
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
        <a href="/usuarios/novo" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
    </div>
    </div>
    </header>
</div>
