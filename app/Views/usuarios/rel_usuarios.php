<div class="content-titulo">
    <header class="text-center">
        <div>
            <h1 class="display-3 fw-bold">Relatório de Usuários</h1>
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
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tbody id="userTable">
                <?php foreach ($usuarios as $user): ?>
                    <tr>
                        <td><?= $user['id_usuario'] ?></td>
                        <td><?= $user['nome'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['cpf'] ?></td>
                        <td><?= $user['celular'] ?></td>
                        <td><?= $user['tipo'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
            <div class="d-flex justify-content-between">
                <a href="/dashboard" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
            </div>
    </div>
</div>

