<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="pt-BR">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comida Boa - Cardápio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    
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
                                    <p class="card-text">Nosso prato mais famoso!  é um prato saboroso e reconfortante, que combina a leveza e o formato delicado da massa farfalle com a suculência das almôndegas. O molho de espinafre cremoso traz um toque de frescor e sabor intenso, complementado pela crocância do grão-de-bico frito, que adiciona uma textura única ao prato. "</p>
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

        <br>
        <header class="text-center" id="pagina-inicial">
            <a href="#cardapio" class="btn btn-lg btn-peça-agora">Peça Agora!</a>           
        </header>

        <div class="container my-5 text-center nossa-historia-container">
            <h2 class="title">Nossa História</h2>
            <p style="color: beige;">A História da Inauguração do Restaurante "Comida Boa"
        
            Era uma manhã ensolarada de primavera quando o sonho do "Comida Boa" finalmente se tornou realidade. Fundado por um grupo de amigos apaixonados por gastronomia e pela alegria de reunir pessoas ao redor de uma boa refeição, o restaurante nasceu com um propósito claro: oferecer pratos deliciosos, preparados com carinho e ingredientes frescos, criando um ambiente acolhedor e inesquecível para todos os que cruzassem suas portas.
            <br><br>
            A ideia de abrir o "Comida Boa" surgiu de uma conversa descontraída entre os fundadores durante uma viagem gastronômica. A partir daquele momento, a paixão por experimentar sabores e compartilhar momentos especiais foi o combustível que impulsionou a realização desse sonho. Eles sabiam que queriam mais do que um simples restaurante; queriam criar um espaço onde as pessoas se sentissem em casa, saboreando pratos que transmitissem o amor e a dedicação de quem os preparava.
            <br><br>
            O local escolhido para a inauguração foi um charmoso casarão antigo no centro de Jaú, com paredes de tijolos expostos e janelas grandes que permitiam que a luz natural entrasse, criando uma atmosfera acolhedora e convidativa. O ambiente foi cuidadosamente decorado, misturando o rústico e o moderno, com toques de sofisticação e, ao mesmo tempo, uma sensação de aconchego. Cada detalhe foi pensado para transmitir a sensação de que, ali, as pessoas não apenas iriam se alimentar, mas viver uma experiência.
            <br><br>
            A grande inauguração aconteceu em uma noite fria de outono, com uma fila de pessoas ansiosas do lado de fora. O aroma do prato especial do dia – um suculento e temperado filé de mignon acompanhado de um purê de batatas cremoso e legumes frescos – começava a se espalhar pelas ruas e fazia com que a curiosidade se transformasse em desejo imediato. A equipe do "Comida Boa" estava preparada para receber os primeiros clientes, e a expectativa era palpável.
            <br><br>
            Os primeiros passos do restaurante foram desafiadores. Eles enfrentaram dificuldades, como qualquer novo empreendimento, mas a paixão pela cozinha e a vontade de fazer bem feito nunca os deixou desistir. Ao longo dos primeiros meses, o restaurante foi conquistando a confiança dos clientes e, aos poucos, uma clientela fiel foi se formando. O "Comida Boa" se tornou um ponto de encontro onde amigos e famílias celebravam momentos especiais, ou simplesmente saboreavam uma refeição feita com amor.
            <br><br>
            Com o tempo, o restaurante começou a expandir suas opções de cardápio, incluindo pratos autorais que mesclavam influências locais com receitas internacionais. Mas uma coisa sempre se manteve constante: a busca por qualidade e o compromisso com a experiência do cliente. A filosofia de que "comida boa é aquela feita com alma" permeia cada prato servido, desde os mais simples até os mais sofisticados.
            <br><br>
            Hoje, o "Comida Boa" não é apenas um restaurante, mas um símbolo de como sonhos podem se tornar realidade quando são feitos com dedicação, amor e, claro, boa comida. O restaurante se tornou um verdadeiro ícone na cidade, com uma equipe apaixonada e clientes que voltam sempre, atraídos não só pela comida, mas pela sensação de pertencimento e carinho que o ambiente transmite.
            <br><br>
            E assim continua a história do "Comida Boa" – um lugar onde o prazer de comer e a alegria de estar com quem amamos se encontram, criando memórias que durarão para sempre.</p>
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
