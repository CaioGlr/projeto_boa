<!-- Página do Dashboard - Painel principal do sistema -->

<!-- Cabeçalho da página -->
<div class="content-titulo">
    <header class="text-center">
        <div>
            <h1 class="display-3 fw-bold">Dashboard</h1>
        </div>
    </header>
</div>

<!-- Exibe mensagens de sucesso ou erro se existirem -->
<?php if (isset($_SESSION['mensagem'])): ?>
    <div class="d-flex justify-content-center mt-4">
        <div class="alert alert-<?= $_SESSION['tipo_mensagem'] ?? 'info' ?> alert-dismissible fade show w-75 text-center" role="alert">
            <?= $_SESSION['mensagem'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <?php 
        // Remove as mensagens da sessão após exibi-las
        unset($_SESSION['mensagem']);
        unset($_SESSION['tipo_mensagem']);
    ?>
<?php endif; ?>

<!-- Container principal do dashboard -->
<div class="container mt-1 box">
    <!-- Cards de estatísticas -->
    <div class="row">
        <!-- Card de Usuários -->
        <div class="col-md-4">
            <div class="card text-center p-3">
                <i class="fas fa-users fa-3x mb-2"></i>
                <h5>Usuários Registrados</h5>
            </div>
        </div>
        <!-- Card de Produtos -->
        <div class="col-md-4">
            <div class="card text-center p-3">
                <i class="fas fa-box fa-3x mb-2"></i>
                <h5>Produtos Cadastrados</h5>
            </div>
        </div>
        <!-- Card de Vendas -->
        <div class="col-md-4">
            <div class="card text-center p-3">
                <i class="fas fa-shopping-cart fa-3x mb-2"></i>
                <h5>Vendas da Empresa</h5>
            </div>
        </div>
    </div>

    <!-- Seção de navegação rápida -->
    <div class="mt-4">
        <div class="row text-center">
            <!-- Seção de Usuários -->
            <div class="col-md-4 mb-3">
                <h5 class="text-white">Usuários</h5>
                <!-- Botão para relatório de usuários -->
                <a href="/usuarios/relatorio" class="btn btn-light d-block mb-2">
                    <i class="fas fa-file-alt"></i> Relatório de Usuários
                </a>
                <!-- Botão para listar usuários -->
                <a href="/usuarios" class="btn btn-warning text-dark d-block mb-2">
                    <i class="fas fa-list-alt"></i> Listar Usuários
                </a>
                <!-- Botão para cadastrar usuário -->
                <a href="/usuarios/novo" class="btn btn-success d-block">
                    <i class="fas fa-user-plus"></i> Cadastrar Usuário
                </a>
            </div>

            <!-- Seção de Produtos -->
            <div class="col-md-4 mb-3">
                <h5 class="text-white">Produtos</h5>
                <!-- Botão para relatório de produtos -->
                <a href="/produtos/relatorio" class="btn btn-light d-block mb-2">
                    <i class="fas fa-file-alt"></i> Relatório de Produtos
                </a>
                <!-- Botão para listar produtos -->
                <a href="/produtos" class="btn btn-warning text-dark d-block mb-2">
                    <i class="fas fa-list"></i> Listar Produtos
                </a>
                <!-- Botão para cadastrar produto -->
                <a href="/produtos/novo" class="btn btn-success d-block">
                    <i class="fas fa-plus"></i> Cadastrar Produto
                </a>
            </div>

            <!-- Seção de Vendas -->
            <div class="col-md-4 mb-3">
                <h5 class="text-white">Vendas</h5>
                <!-- Botão para relatório de vendas -->
                <a href="/vendas/relatorio" class="btn btn-light d-block mb-2">
                    <i class="fas fa-file-alt"></i> Relatório de Vendas
                </a>
                <!-- Botão para listar vendas -->
                <a href="/vendas" class="btn btn-warning text-dark d-block mb-2">
                    <i class="fas fa-list-alt"></i> Listar Vendas
                </a>
                <!-- Botão para registrar venda -->
                <a href="/vendas/novo" class="btn btn-success d-block">
                    <i class="fas fa-cash-register"></i> Registrar Venda
                </a>
            </div>
        </div>
    </div>
</div>
