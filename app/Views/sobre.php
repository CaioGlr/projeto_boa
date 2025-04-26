<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comida Boa - Restaurante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg shadow-sm w-100">
        <div class="container-fluid">
      
            
            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
                <i class="fas fa-bars"></i> Menu
            </button>
    
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <ul class="navbar-nav me-auto justify-content-between w-100">
                <li class="nav-item text-cartoon fs-4 fw-bold mb-2">Comida Boa</li>
                <li class="nav-item"><a class="nav-link text-center" href="/home"><i class="fas fa-home"></i> Página Inicial</a></li>
                <li class="nav-item"><a class="nav-link text-center" href="/cardapio"><i class="fas fa-utensils"></i> Cardápio</a></li>
                <li class="nav-item"><a class="nav-link text-center" href="/entrar"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                <li class="nav-item"><a class="nav-link text-center" href="/usuarios/novo"><i class="fas fa-user-plus"></i> Cadastro</a></li>
            </ul>
        </div>
    </nav>
    <!-- Side Bar -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
        <div class="offcanvas-header" style="background-color: #ffffff;">
            <h5 class="offcanvas-title text-dark text-center fw-bold" id="sidebarLabel">Comida Boa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav_bar ms-auto flex-column">
                <li class="nav-item d-flex justify-content-start">
                    <a class="nav-link me-2" href="/entrar">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                    <a class="nav-link" href="/usuarios/novo">
                        <i class="fas fa-user-plus"></i> Cadastro
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/home ">
                        <i class="fas fa-home"></i> Página Inicial
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">
                        <i class="fas fa-chart-line"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/usuarios">
                        <i class="fas fa-users"></i> Listagem de Usuários
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/produtos/novo">
                        <i class="fas fa-box"></i> Cadastro de Produtos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/produtos">
                        <i class="fas fa-list"></i> Listagem de Produtos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/vendas/novo">
                        <i class="fas fa-file-invoice-dollar"></i> Registro de Vendas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/vendas">
                        <i class="fas fa-list-alt"></i> Lista de Vendas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/sobre">
                        <i class="fas fa-headset"></i> Contato e Suporte
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="content-titulo">
        <header class="text-center">
            <div>
                <h1 class="display-3 fw-bold">Contato e Suporte</h1>
                <h3 class="lead ">Se você tiver alguma dúvida ou precisar de ajuda, entre em contato conosco preenchendo o formulário abaixo.</h3>
            </div>
        </header>

        <div class="contact-container d-flex justify-content-center">
            <form action="#" method="post" class="w-50">
                <!-- Campo de Nome -->
                <div class="col-md-12 mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" required>
                </div>

                <!-- Campo de E-mail -->
                <div class="col-md-12 mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" required>
                </div>

                <!-- Campo de Mensagem -->
                <div class="col-md-12 mb-3">
                    <label for="mensagem" class="form-label">Mensagem</label>
                    <textarea class="form-control" id="mensagem" name="mensagem" rows="5" placeholder="Digite sua mensagem" required></textarea>
                </div>

                <!-- Botão de Submissão -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-danger">Submeter</button>
                </div>
            </form>
        </div>

        <!-- Rodapé -->
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
                        <p><i class="fas fa-calendar-day"></i> <strong>Segunda a Sexta:</strong> 11:00 - 22:00</p>
                        <p><i class="fas fa-calendar-alt"></i> <strong>Sábado e Feriados:</strong> 14:00 - 20:00</p>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
