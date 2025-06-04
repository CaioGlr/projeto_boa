<div class="content-titulo">
    <header class="text-center">
        <div>
            <h1 class="display-3 fw-bold">Relatório de Usuários</h1>
        </div>
    </header>

    <div class="container mt-4 box">
        <input type="text" id="search" class="form-control mb-3" placeholder="Pesquisar usuário...">

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
            <button onclick="window.print()" class="btn btn-dark px-4 py-2 fs-5">
                <i class="fas fa-print"></i> Imprimir Relatório
            </button>
        </div>

        </style>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
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
