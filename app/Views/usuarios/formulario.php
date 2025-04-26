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
                    <a class="nav-link" href="/home">
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
            <h1 class="display-3 fw-bold">Cadastro</h1>
        </div>
    </header>
</div>
 <div class="row d-flex justify-content-evenly">
    <!-- Nome Completo -->
    <div class="col-md-5 mb-3">
        <label for="nome" class="form-label">Nome Completo</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome completo" required>
    </div>

    <!-- CPF -->
    <div class="col-md-5 mb-3">
        <label for="cpf" class="form-label">CPF</label>
        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF" required>
    </div>
</div>

<div class="row d-flex justify-content-evenly">
    <!-- Data de Nascimento -->
    <div class="col-md-5 mb-3">
        <label for="data-nascimento" class="form-label">Data de Nascimento</label>
        <input type="date" class="form-control" id="data-nascimento" name="data-nascimento" required>
    </div>

    <!-- Celular -->
    <div class="col-md-5 mb-3">
        <label for="celular" class="form-label">Celular</label>
        <input type="tel" class="form-control" id="celular" name="celular" placeholder="Digite seu celular" required>
    </div>
</div>

<div class="row d-flex justify-content-evenly">
    <!-- Rua -->
    <div class="col-md-5 mb-3">
        <label for="rua" class="form-label">Rua</label>
        <input type="text" class="form-control" id="rua" name="rua" placeholder="Digite sua rua" required>
    </div>
    
    <!-- Bairro -->
    <div class="col-md-5 mb-3">
        <label for="bairro" class="form-label">Bairro</label>
        <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Digite seu bairro" required>
    </div>
</div>

<div class="row d-flex justify-content-evenly">
    <!-- Cidade -->
    <div class="col-md-5 mb-3">
        <label for="cidade" class="form-label">Cidade</label>
        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Digite sua cidade" required>
    </div>

    <!-- Estado -->
    <div class="col-md-5 mb-3">
        <label for="estado" class="form-label">Estado</label>
        <select class="form-select" id="estado" name="estado" required>
            <option value="">Selecione o Estado</option>
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
        </select>
    </div>
</div>

<div class="row d-flex justify-content-evenly">
    <!-- CEP -->
    <div class="col-md-5 mb-3">
        <label for="cep" class="form-label">CEP</label>
        <input type="text" class="form-control" id="cep" name="cep" placeholder="Digite seu CEP" required>
    </div>

    <!-- E-mail -->
    <div class="col-md-5 mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" required>
    </div>
</div>

<div class="row d-flex justify-content-evenly">
    <!-- Senha -->
    <div class="col-md-5 mb-3">
        <label for="senha" class="form-label">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
    </div>

    <!-- Confirmar Senha -->
    <div class="col-md-5 mb-3">
        <label for="confirmar-senha" class="form-label">Confirmar Senha</label>
        <input type="password" class="form-control" id="confirmar-senha" name="confirmar-senha" placeholder="Confirme sua senha" required>
    </div>
</div>

<div class="row d-flex justify-content-evenly">
    <!-- Tipo de Usuário -->
    <div class="col-md-5 mb-3">
        <label for="tipo-usuario" class="form-label">Tipo de Usuário</label>
        <select class="form-select" id="tipo-usuario" name="tipo-usuario" required>
            <option value="Administrador">Administrador</option>
            <option value="Funcionario">Funcionário</option>
            <option value="Cliente">Cliente</option>
        </select>
    </div>
    <div class="cold-md-4 gap-2 mt-2 text-center ">
        <button type="submit" class="btn btn-danger">Submeter</button>
    </div>

</div>
</div>

<!--Rodapé-->
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
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>