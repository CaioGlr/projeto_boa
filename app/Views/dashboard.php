<div class="content-titulo">
    <header class="text-center">
        <div>
            <h1 class="display-3 fw-bold">Dashboard</h1>
        </div>
    </header>
</div>

<div class="container mt-1 box">
    <div class="row">
        <div class="col-md-4">
            <div class="card text-center p-3">
                <i class="fas fa-users fa-3x mb-2"></i>
                <h5>Clientes Registrados</h5>
                <p class="fs-4">0</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center p-3">
                <i class="fas fa-box fa-3x mb-2"></i>
                <h5>Total de Produtos</h5>
                <p class="fs-4">0</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center p-3">
                <i class="fas fa-shopping-cart fa-3x mb-2"></i>
                <h5>Total de Vendas</h5>
                <p class="fs-4">0</p>
            </div>
        </div>

    </div>

    <div class="mt-4">
        <div class="row text-center">
            <!-- Usuários -->
            <div class="col-md-4 mb-3">
                <h5 class="text-white">Usuários</h5>
                <a href="/usuarios/relatorio" class="btn btn-light d-block mb-2">
                    <i class="fas fa-file-alt"></i> Relatório de Usuários
                </a>
                <a href="/usuarios" class="btn btn-info text-white d-block mb-2">
                    <i class="fas fa-list-alt"></i> Listar Usuários
                </a>
                <a href="/usuarios/novo" class="btn btn-success d-block">
                    <i class="fas fa-user-plus"></i> Cadastrar Usuário
                </a>
            </div>

            <!-- Produtos -->
            <div class="col-md-4 mb-3">
                <h5 class="text-white">Produtos</h5>
                <a href="/produtos/relatorio" class="btn btn-light d-block mb-2">
                    <i class="fas fa-file-alt"></i> Relatório de Produtos
                </a>
                <a href="/produtos" class="btn btn-secondary d-block mb-2">
                    <i class="fas fa-list"></i> Listar Produtos
                </a>
                <a href="/produtos/novo" class="btn btn-primary d-block">
                    <i class="fas fa-plus"></i> Cadastrar Produto
                </a>
            </div>

            <!-- Vendas -->
            <div class="col-md-4 mb-3">
                <h5 class="text-white">Vendas</h5>
                <a href="/vendas/relatorio" class="btn btn-light d-block mb-2">
                    <i class="fas fa-file-alt"></i> Relatório de Vendas
                </a>
                <a href="/vendas" class="btn btn-warning d-block mb-2">
                    <i class="fas fa-list-alt"></i> Listar Vendas
                </a>
                <a href="/vendas/novo" class="btn btn-danger d-block">
                    <i class="fas fa-cash-register"></i> Registrar Venda
                </a>
            </div>
        </div>
    </div>
</div>