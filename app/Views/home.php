<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="pt-BR">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="icon" href="/img/Icone.png" type="image/png">

</head>

<body>
    <!-- Barra de Navegação Superior -->
    <nav class="navbar navbar-expand-lg shadow-sm w-100">
        <div class="container-fluid">
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
    <!-- Conteúdo Principal -->
    <div class="content-titulo">
        <header class="text-center">
            <div>
                <h1 class="display-3 fw-bold">Bem-vindo ao Comida Boa!</h1>
                <h3 class="lead ">Sabores incríveis, preparados com amor.</h3>
            </div>
        </header>
    </div>
    <header id="cardapio"></header>
    <div id="carouselCardapio" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicadores -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselCardapio" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carouselCardapio" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselCardapio" data-bs-slide-to="2"></button>
        </div>

        <!-- Slides -->
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <div class="d-flex justify-content-center position-relative">
                    <div class="card shadow-sm" style="width: 850px; height: 850px; display: flex; justify-content: center; align-items: center;">
                        <img src="../img/Cardápio/farfalle-pasta-with-meatballs-spinach-sauce-with-fried-chickpeas.jpg" class="card-img-top" alt="Prato 1" style="object-fit: cover; height: 100%; width: 100%;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Farfalle com Almôndegas ao Molho de Espinafre e Grão-de-Bico Frito</h5>
                            <p class="card-text">Nosso prato mais famoso! é um prato saboroso e reconfortante, que combina a leveza e o formato delicado da massa farfalle com a suculência das almôndegas. O molho de espinafre cremoso traz um toque de frescor e sabor intenso, complementado pela crocância do grão-de-bico frito, que adiciona uma textura única ao prato. "</p>
                            <p class="fw-bold">R$ 29,90</p>
                        </div>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselCardapio" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselCardapio" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>

            <div class="carousel-item" data-bs-interval="10000">
                <div class="d-flex justify-content-center position-relative">
                    <div class="card shadow-sm" style="width: 850px; height: 850px; display: flex; justify-content: center; align-items: center;">
                        <img src="../img/Cardápio/penne-pasta.jpg" class="card-img-top" alt="Prato 2" style="object-fit: cover; height: 100%; width: 100%;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Penne Pasta</h5>
                            <p class="card-text">Prato clássico da culinária italiana, caracterizado por sua massa em formato de tubos curtos e inclinados. Com uma textura firme e que absorve bem os molhos, o penne é frequentemente servido com uma variedade de opções de molho, como o suculento molho de tomate, molho branco cremoso ou até mesmo uma combinação de azeite de oliva e alho. É uma opção deliciosa e versátil, perfeita para quem busca um prato reconfortante e saboroso..</p>
                            <p class="fw-bold">R$ 39,90</p>
                        </div>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselCardapio" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselCardapio" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>

            <div class="carousel-item" data-bs-interval="10000">
                <div class="d-flex justify-content-center position-relative">
                    <div class="card shadow-sm" style="width: 850px; height: 850px; display: flex; justify-content: center; align-items: center;">
                        <img src="../img/Cardápio/plate-grilled-steak-meat-with-vegetables-white-background-photo-menu.jpg" class="card-img-top" alt="Prato 3" style="object-fit: cover; height: 100%; width: 100%;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Prato de Bifé Grelhado com Legumes</h5>
                            <p class="card-text"> É uma refeição suculenta e equilibrada, onde o bife grelhado, geralmente de corte nobre, é preparado até atingir o ponto perfeito de maciez e sabor. Acompanhado por uma seleção de legumes frescos, como cenouras, brócolis, e batatas, o prato oferece uma combinação de texturas e sabores, com o toque defumado da grelha e o frescor dos vegetais..</p>
                            <p class="fw-bold">R$ 49,90</p>
                        </div>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselCardapio" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselCardapio" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
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