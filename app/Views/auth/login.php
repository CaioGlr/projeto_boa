<?php
if (isset($_SESSION['usuario_email'])) {
    // Se o usuário já estiver logado, redireciona para o dashboard
    header('Location: /dashboard');
    exit;
}
$dados = $_SESSION['dados'] ?? [];  ?>

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
    <div class="row py-5">
        <div class="col-12 d-flex">
            <div class="login-container">
                <?php
                if (isset($_SESSION['erros'])):
                    $erros = $_SESSION['erros'];
                ?>

                    <div class="alert alert-danger row py-5" role="alert">
                        <h4 class="alert-heading">Erro ao entrar!</h4>
                        <ul>
                            <?php foreach ($erros as $e): ?>
                                <li><?= $e ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif;
                unset($_SESSION['erros']); // LIMPA OS ERROS IMEDIATAMENTE 
                ?>

                <div class="login-header text-center">
                    <h2>Login</h2>
                    <p>Bem-vindo de volta ao Comida Boa!</p>
                </div>


                <form action="/entrar" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
                    </div>
                    <div class="d-grid gap-2">

                        <button type="submit" class="btn btn-danger">Entrar</button>
                        <a href="/dashboard"><button type="submit" class="btn btn-primary">Entrar como demonstração</button></a>

                    </div>
                </form>
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