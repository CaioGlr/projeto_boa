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
                <i class="fas fa-box fa-3x mb-2"></i>
                <h5>Total de Produtos</h5>
                <p class="fs-4">0</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center p-3">
                <i class="fas fa-shopping-cart fa-3x mb-2"></i>
                <h5>Vendas do Dia</h5>
                <p class="fs-4">0</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center p-3">
                <i class="fas fa-users fa-3x mb-2"></i>
                <h5>Clientes Registrados</h5>
                <p class="fs-4">0</p>
            </div>
        </div>
    </div>
    <div class="mt-4 text-center">
        <div class="d-flex flex-wrap justify-content-center gap-2">
            <!-- Usuários -->
            <a href="/usuarios/novo" class="btn btn-success"><i class="fas fa-user-plus"></i> Cadastrar Usuário</a>
            <a href="/usuarios" class="btn btn-info text-white"><i class="fas fa-list-alt"></i> Listar Usuários</a>
            
            <!-- Separator -->
            <span class="vr d-none d-md-inline"></span>
            
            <!-- Produtos -->
            <a href="/produtos/novo" class="btn btn-primary"><i class="fas fa-plus"></i> Cadastrar Produto</a>
            <a href="/produtos" class="btn btn-secondary"><i class="fas fa-list"></i> Listar Produtos</a>
            
            <!-- Separator -->
            <span class="vr d-none d-md-inline"></span>
            
            <!-- Vendas -->
            <a href="/vendas/novo" class="btn btn-danger"><i class="fas fa-cash-register"></i> Registrar Venda</a>
            <a href="/vendas" class="btn btn-warning"><i class="fas fa-list-alt"></i> Listar Vendas</a>
        </div>
    </div>
</div>