<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comida Boa - Cardápio</title>
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
            <h1 class="display-3 fw-bold">Cardápio</h1>
        </div>
    </header>
</div>
    <div id="cardapio" class="container my-5 text-white text-center">

    
        <!-- Seção: Café da Manhã -->
        <h3 class="fw-bold mt-4">☕ Café da Manhã</h3>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card text-center shadow-sm p-2">
                    <img src="../img/Cardápio/delicious-donut-coffee-cup.jpg" class="card-img-top" alt="Pão na Chapa">
                    <div class="card-body">
                        <h5 class="card-title">Donut com Café</h5>
                        <p class="fw-bold text-primary">R$ 5,90</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn btn-outline-danger" onclick="alterarQuantidade(this, -1)">-</button>
                            <span class="mx-2 quantidade">0</span>
                            <button class="btn btn-outline-success" onclick="alterarQuantidade(this, 1)">+</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center shadow-sm p-2">
                    <img src="../img/Cardápio/Captura de tela 2025-03-03 191302.png" class="card-img-top" alt="Café com Leite">
                    <div class="card-body">
                        <h5 class="card-title">Pão com Manteiga com Café</h5>
                        <p class="fw-bold text-primary">R$ 8,90</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn btn-outline-danger" onclick="alterarQuantidade(this, -1)">-</button>
                            <span class="mx-2 quantidade">0</span>
                            <button class="btn btn-outline-success" onclick="alterarQuantidade(this, 1)">+</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center shadow-sm p-2">
                    <img src="../img/Cardápio/bread-with-butter.jpg" class="card-img-top" alt="Tapioca de Queijo">
                    <div class="card-body">
                        <h5 class="card-title">Pão com Leite</h5>
                        <p class="fw-bold text-primary">R$ 6,90</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn btn-outline-danger" onclick="alterarQuantidade(this, -1)">-</button>
                            <span class="mx-2 quantidade">0</span>
                            <button class="btn btn-outline-success" onclick="alterarQuantidade(this, 1)">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary mt-3 text-center" onclick="mostrarMais('cafe-da-manha')">Mostrar Mais</button>
    
        <!-- Seção: Almoço -->
        <h3 class="fw-bold mt-4">🍽️ Almoço</h3>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card text-center shadow-sm p-2">
                    <img src="../img/Cardápio/farfalle-pasta-with-meatballs-spinach-sauce-with-fried-chickpeas.jpg" class="card-img-top" alt="Prato Executivo">
                    <div class="card-body">
                        <h5 class="card-title">Farfalle com Almôndegas ao Molho de Espinafre e Grão-de-Bico Frito</h5>
                        <p class="fw-bold text-primary">R$ 29,90</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn btn-outline-danger" onclick="alterarQuantidade(this, -1)">-</button>
                            <span class="mx-2 quantidade">0</span>
                            <button class="btn btn-outline-success" onclick="alterarQuantidade(this, 1)">+</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center shadow-sm p-2">
                    <img src="../img/Cardápio/penne-pasta.jpg" class="card-img-top" alt="Frango Grelhado">
                    <div class="card-body">
                        <h5 class="card-title">Penne Pasta</h5>
                        <p class="fw-bold text-primary">R$ 39,90</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn btn-outline-danger" onclick="alterarQuantidade(this, -1)">-</button>
                            <span class="mx-2 quantidade">0</span>
                            <button class="btn btn-outline-success" onclick="alterarQuantidade(this, 1)">+</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center shadow-sm p-2">
                    <img src="../img/Cardápio/plate-grilled-steak-meat-with-vegetables-white-background-photo-menu.jpg" class="card-img-top" alt="Lasanha à Bolonhesa">
                    <div class="card-body">
                        <h5 class="card-title">Prato de Bifé Grelhado com Legumes</h5>
                        <p class="fw-bold text-primary">R$ 49,90</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn btn-outline-danger" onclick="alterarQuantidade(this, -1)">-</button>
                            <span class="mx-2 quantidade">0</span>
                            <button class="btn btn-outline-success" onclick="alterarQuantidade(this, 1)">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary mt-3 text-center" onclick="mostrarMais('cafe-da-manha')">Mostrar Mais</button>
    
        <!-- Seção: Jantar -->
        <h3 class="fw-bold mt-4">🌙 Jantar</h3>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card text-center shadow-sm p-2">
                    <img src="../img/Cardápio/hamburger-with-cheese-lettuce-tomatoes.jpg" class="card-img-top" alt="Hambúrguer Artesanal">
                    <div class="card-body">
                        <h5 class="card-title">Hambúrguer Natural</h5>
                        <p class="fw-bold text-primary">R$ 11,90</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn btn-outline-danger" onclick="alterarQuantidade(this, -1)">-</button>
                            <span class="mx-2 quantidade">0</span>
                            <button class="btn btn-outline-success" onclick="alterarQuantidade(this, 1)">+</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center shadow-sm p-2">
                    <img src="../img/Cardápio/pizza-with-cheese-tomato-isolated-white-background-pizza-margarita-top-view-photo-menu.jpg" class="card-img-top" alt="Pizza Média">
                    <div class="card-body">
                        <h5 class="card-title">Pizza de Queijo</h5>
                        <p class="fw-bold text-primary">R$ 35,90</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn btn-outline-danger" onclick="alterarQuantidade(this, -1)">-</button>
                            <span class="mx-2 quantidade">0</span>
                            <button class="btn btn-outline-success" onclick="alterarQuantidade(this, 1)">+</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center shadow-sm p-2">
                    <img src="../img/Cardápio/close-up-seafood-risotto-plate-with-tomato-sauce-garnished-with-shrimp.jpg" class="card-img-top" alt="Risoto de Camarão">
                    <div class="card-body">
                        <h5 class="card-title">Risoto de Camarão</h5>
                        <p class="fw-bold text-primary">R$ 32,90</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn btn-outline-danger" onclick="alterarQuantidade(this, -1)">-</button>
                            <span class="mx-2 quantidade">0</span>
                            <button class="btn btn-outline-success" onclick="alterarQuantidade(this, 1)">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary mt-3 text-center" onclick="mostrarMais('cafe-da-manha')">Mostrar Mais</button>
    
        <!-- Seção: Sobremesas -->
        <h3 class="fw-bold mt-4">🍰 Sobremesas</h3>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card text-center shadow-sm p-2">
                    <img src="../img/Cardápio/cheesecake-with-caramel-nuts-it.jpg" class="card-img-top" alt="Pudim de Leite">
                    <div class="card-body">
                        <h5 class="card-title">Pudim de Leite</h5>
                        <p class="fw-bold text-primary">R$ 8,90</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn btn-outline-danger" onclick="alterarQuantidade(this, -1)">-</button>
                            <span class="mx-2 quantidade">0</span>
                            <button class="btn btn-outline-success" onclick="alterarQuantidade(this, 1)">+</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center shadow-sm p-2">
                    <img src="../img/Cardápio/chocolate-brownie-portion-isolated-white-background.jpg" class="card-img-top" alt="Brownie com Sorvete">
                    <div class="card-body">
                        <h5 class="card-title">Brownie com Sorvete</h5>
                        <p class="fw-bold text-primary">R$ 7,90</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn btn-outline-danger" onclick="alterarQuantidade(this, -1)">-</button>
                            <span class="mx-2 quantidade">0</span>
                            <button class="btn btn-outline-success" onclick="alterarQuantidade(this, 1)">+</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center shadow-sm p-2">
                    <img src="../img/Cardápio/Torta de Limão.png" class="card-img-top" alt="Torta de Limão">
                    <div class="card-body">
                        <h5 class="card-title">Pedaço de Torta de Limão</h5>
                        <p class="fw-bold text-primary">R$ 5,90</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn btn-outline-danger" onclick="alterarQuantidade(this, -1)">-</button>
                            <span class="mx-2 quantidade">0</span>
                            <button class="btn btn-outline-success" onclick="alterarQuantidade(this, 1)">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary mt-3 text-center" onclick="mostrarMais('cafe-da-manha')">Mostrar Mais</button>
    
        <!-- Seção: Refrigerantes -->
        <h3 class="fw-bold mt-4">🥤 Refrigerantes</h3>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card text-center shadow-sm p-2">
                    <img src="../img/Cardápio/RefrigeranteLata.png" class="card-img-top" alt="Coca-Cola Lata">
                    <div class="card-body">
                        <h5 class="card-title">Refrigerante Lata 600ml</h5>
                        <p class="fw-bold text-primary">R$ 5,90</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn btn-outline-danger" onclick="alterarQuantidade(this, -1)">-</button>
                            <span class="mx-2 quantidade">0</span>
                            <button class="btn btn-outline-success" onclick="alterarQuantidade(this, 1)">+</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center shadow-sm p-2">
                    <img src="../img/Cardápio/sucolaranja.jpg" class="card-img-top" alt="Coca-Cola Lata">
                    <div class="card-body">
                        <h5 class="card-title">Suco de Laranja</h5>
                        <p class="fw-bold text-primary">R$ 4,90</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn btn-outline-danger" onclick="alterarQuantidade(this, -1)">-</button>
                            <span class="mx-2 quantidade">0</span>
                            <button class="btn btn-outline-success" onclick="alterarQuantidade(this, 1)">+</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center shadow-sm p-2">
                    <img src="../img/Cardápio/Garrafaagua.png" class="card-img-top" alt="Coca-Cola Lata">
                    <div class="card-body">
                        <h5 class="card-title">Garrafa de Água 500ml</h5>
                        <p class="fw-bold text-primary">R$ 2,90</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn btn-outline-danger" onclick="alterarQuantidade(this, -1)">-</button>
                            <span class="mx-2 quantidade">0</span>
                            <button class="btn btn-outline-success" onclick="alterarQuantidade(this, 1)">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary mt-3 text-center" onclick="mostrarMais('cafe-da-manha')">Mostrar Mais</button>
    </div>
    <div class="text-center mt-5">
        <button class="btn btn-lg btn-success text-center" onclick="submeterPedido()">Submeter Pedido</button>
    </div>

    <script>
        function alterarQuantidade(botao, valor) {
            let quantidadeSpan = botao.parentElement.querySelector('.quantidade');
            let quantidade = parseInt(quantidadeSpan.innerText) + valor;
            if (quantidade >= 0) {
                quantidadeSpan.innerText = quantidade;
            }
        }

        function mostrarMais(id) {
            alert('Mais opções de ' + id.replace('-', ' ') + ' em breve!');
        }

        function submeterPedido() {
            alert('Pedido enviado! Obrigado por comprar conosco.');
        }
    </script>
    
<!--Rodapé-->
<div id="contato" class="content border border-radius 10px bg-dark text-white my-5 text-center p-4">
    <div class="container">
        <div class="row">            <div class="col-md-6 text-start">
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
<!--Footer-->
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