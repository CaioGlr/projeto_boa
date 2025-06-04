
<div class="content-titulo">
    <header class="text-center">
        <div>
            <h1 class="display-3 fw-bold">Cardápio</h1>
        </div>
    </header>
</div>
    <div id="cardapio" class="container my-5 text-white text-center">

    
        <!-- Seção: Café da Manhã -->
        <h3 class="fw-bold mt-4 text-dark">☕ Café da Manhã</h3>
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
        <h3 class="fw-bold mt-4 text-dark">🍽️ Almoço</h3>
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
        <h3 class="fw-bold mt-4 text-dark" >🌙 Jantar</h3>
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
        <h3 class="fw-bold mt-4 text-dark">🍰 Sobremesas</h3>
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
        <h3 class="fw-bold mt-4 text-dark">🥤 Refrigerantes</h3>
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