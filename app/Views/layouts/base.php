<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="pt-BR">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    
</head>
<body>
    <!-- Barra de Navegação Superior -->
    <nav class="navbar navbar-expand-lg shadow-sm w-100">
        <div class="container-fluid">
      
            
            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
                <i class="fas fa-bars"></i> Menu
            </button>
    
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <ul class="navbar-nav me-auto justify-content-between w-100">
            <li class="nav-item text-cartoon fs-4 fw-bold mb-7 text-center" style="color:rgb(255, 255, 255); text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                Comida Boa!!
            </li>
                <li class="nav-item"><a class="nav-link text-center" href="/home"><i class="fas fa-home"></i> Página Inicial</a></li>
                <li class="nav-item"><a class="nav-link text-center" href="/cardapio"><i class="fas fa-utensils"></i> Cardápio</a></li>
                <li class="nav-item"><a class="nav-link text-center" href="/entrar"><i class="fas fa-sign-in-alt"></i> Login</a></li>
            </ul>
        </div>
    </nav>
<!-- Side Bar -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
    <div class="offcanvas-header" style="background-color: #ffffff;">
        <h5 class="offcanvas-title text-dark text-center fw-bold" id="sidebarLabel">
            <i class="fas fa-utensils me-2"></i>Comida Boa
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body p-0">
        <ul class="nav_bar ms-auto flex-column list-unstyled">

            <!-- Página Inicial e Dashboard -->
            <li class="nav-item d-flex flex-column">
                <a class="nav-link" href="/home">
                    <i class="fas fa-home me-2"></i> Página Inicial
                </a>
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-chart-line me-2"></i> Dashboard
                </a>
            </li>

            <!-- Usuários -->
            <div class="bg-black text-white p-2 ps-3 fw-bold">
                <i class="fas fa-users me-2"></i>USUÁRIOS
            </div>
            <li class="nav-item">
                <a class="nav-link" href="/usuarios/novo">
                    <i class="fas fa-user-plus me-2"></i> Cadastro de Usuário
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/usuarios">
                    <i class="fas fa-address-book me-2"></i> Listagem de Usuários
                </a>
            </li>

            <!-- Produtos -->
            <div class="bg-black text-white p-2 ps-3 fw-bold">
                <i class="fas fa-boxes me-2"></i>PRODUTOS
            </div>
            <li class="nav-item">
                <a class="nav-link" href="/produtos/novo">
                    <i class="fas fa-plus-square me-2"></i> Cadastro de Produtos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/produtos">
                    <i class="fas fa-clipboard-list me-2"></i> Listagem de Produtos
                </a>
            </li>

            <!-- Vendas -->
            <div class="bg-black text-white p-2 ps-3 fw-bold">
                <i class="fas fa-shopping-cart me-2"></i>VENDAS
            </div>
            <li class="nav-item">
                <a class="nav-link" href="/vendas/novo">
                    <i class="fas fa-file-invoice-dollar me-2"></i> Registro de Vendas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/vendas">
                    <i class="fas fa-receipt me-2"></i> Lista de Vendas
                </a>
            </li>

            <!-- Outros -->
            <div class="bg-black text-white p-2 ps-3 fw-bold">
                <i class="fas fa-cogs me-2"></i>OUTROS
            </div>
            <li class="nav-item">
                <a class="nav-link" href="/sobre">
                    <i class="fas fa-headset me-2"></i> Contato e Suporte
                </a>
            </li>
        </ul>
    </div>
</div>

    <!-- Conteúdo Principal -->
    <?php
    echo $content;
    ?>
    <!--Seção de Contato-->
    <div id="contato" class="content border border-radius 10px bg-dark text-white my-5 text-center p-4">
        <div class="container">
            <div class="row">
    
                <div class="col-md-6 text-start">
                    <h2 class="fw-bold">
                        <i class="fas fa-address-book"></i> Contato
                    </h2>
                    <p><i class="fas fa-map-marker-alt"></i> <strong>Endereço:</strong> Rua 1, 226 - Bairro da Boa Comida, Jaú - SP</p>
                    <p><i class="fas fa-phone"></i> <strong>Telefone:</strong> (14) 1234-5678</p>
                    <p><i class="fas fa-envelope"></i> <strong>Email:</strong> contato@comidaboa.com.br</p>
                </div>
                
    
                <div class="col-md-6 text-start">
                    <h2 class="fw-bold">
                        <i class="fas fa-clock"></i> Horário de Funcionamento
                    </h2>
                    <p><i class="fas fa-calendar-day"></i> <strong>Segunda a Sexta:</strong> 6:00 - 22:00</p>
                    <p><i class="fas fa-calendar-alt"></i> <strong>Sábado e Feriados:</strong> 6:00 - 18:00</p>
                    <p><i class="fas fa-times-circle"></i> <strong>Domingo:</strong> Fechado</p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer mt-4">
            <div class="container text-center">
                <p>&copy; 2025 Comida Boa. Todos os direitos reservados.</p>
                <p class="footer-social">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </p>
            </div>
        </footer>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
