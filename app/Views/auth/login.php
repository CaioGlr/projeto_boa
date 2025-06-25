<?php
if (isset($_SESSION['usuario_email'])) {
    // Se o usuário já estiver logado, redireciona para o dashboard
    header('Location: /dashboard');
    exit;
}

$erros = $_SESSION['erros'] ?? [];
unset($_SESSION['erros']); // LIMPA OS ERROS IMEDIATAMENTE

$dados = $_SESSION['dados'] ?? [];
?>

<div class="row py-5">
    <div class="col-12 d-flex flex-column align-items-center">

        <!-- ALERTA DE ERROS -->
        <?php if (!empty($erros)): ?>
            <div class="alert alert-danger col-md-6" role="alert">
                <h4 class="alert-heading">Erro ao entrar!</h4>
                <ul class="mb-0">
                    <?php foreach ($erros as $erro): ?>
                        <li><?= htmlspecialchars($erro) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- CONTAINER DE LOGIN -->
        <div class="login-container col-md-6">

            <div class="login-header text-center">
                <h2>Login</h2>
                <p>Bem-vindo de volta ao Comida Boa!</p>
            </div>

            <form action="/entrar" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input 
                        type="email" 
                        class="form-control" 
                        id="email" 
                        name="email" 
                        placeholder="Digite seu e-mail"
                        value="<?= htmlspecialchars($dados['email'] ?? '') ?>"
                        required
                    >
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input 
                        type="password" 
                        class="form-control" 
                        id="senha" 
                        name="senha" 
                        placeholder="Digite sua senha" 
                        required
                    >
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-danger">Entrar</button>
                    <a href="/dashboard" class="mx-auto">
                        <button type="button" class="btn btn-secondary">Entrar como demonstração</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
