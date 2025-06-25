<?php
// Arquivo principal do sistema - Roteador e ponto de entrada

// Inicia a sessão para gerenciar dados do usuário logado
session_start();

// Importa o autoload do Composer para carregar as classes automaticamente
require __DIR__ . '/../vendor/autoload.php';

// Importa e instancia os Controllers necessários
use App\Controllers\ProdutoController;
// Instancia o Controller de Produtos para ser utilizado (cria objeto)
$produtoCtrl = new ProdutoController();

use App\Controllers\UsuarioController;
// Instancia o Controller de Usuário para ser utilizado (cria objeto)
$usuarioCtrl = new UsuarioController();

use App\Controllers\VendaController;
// Instancia o Controller de Vendas para ser utilizado (cria objeto)
$vendaCtrl = new VendaController();

use App\Controllers\AuthController;
// Instancia o Controller de Autenticação para ser utilizado (cria objeto)
$authCtrl = new AuthController();

// Função para renderizar páginas com autenticação (usando template base.php)
function render($view, $data = [])
{
    // Extrai os dados do array para variáveis individuais
    extract($data);
    // Inicia o buffer de saída para capturar o conteúdo da página
    ob_start();
    // Carrega a página da rota
    require __DIR__ . '/../app/Views/' . $view;
    $content = ob_get_clean();
    // Carrega o template base.php
    // Este template é utilizado para páginas que precisam de autenticação
    require __DIR__ . '/../app/Views/layouts/base.php';
}

// Função para renderizar páginas sem autenticação (usando template base_publico.php)
function render_sem_login($view, $data = [])
{
    // Extrai os dados do array para variáveis individuais
    extract($data);
    // Inicia o buffer de saída para capturar o conteúdo da página
    ob_start();
    // Carrega a página da rota
    require __DIR__ . '/../app/Views/' . $view;
    $content = ob_get_clean();
    // Carrega o template base_publico.php
    // Este template é utilizado para páginas que não precisam de autenticação
    require __DIR__ . '/../app/Views/layouts/base_publico.php';
}

// Obtém a URL da requisição da navegação
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//
// PÁGINAS PRINCIPAIS (PÚBLICAS)
// 

// Página inicial do site
if ($url == "/home"){
    // Renderiza a página inicial sem necessidade de autenticação
    render_sem_login('home.php', ['title' => 'Página Inicial - Comida Boa']);
} 
// Página sobre/contato
else if ($url == '/sobre'){
    render_sem_login('sobre.php', ['title' => 'Sobre o Sistema - Comida Boa']);
} 
// Página do cardápio
else if ($url == "/cardapio"){
    render_sem_login('cardapio.php', ['title' => 'Cardapio - Comida Boa']);
}

//
// DASHBOARD
//

// Usuário logado - página principal do sistema
else if ($url == "/dashboard") {
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        // Se o usuário não estiver logado, redireciona para a página de login
        header('Location: /entrar');
        exit;
    }
    // Se estiver logado, renderiza a página do dashboard
    render('dashboard.php', ['title' => 'Dashboard - Comida Boa']);
}    

// 
// AUTENTICAÇÃO
// 

// Processa o login quando o formulário é enviado (método POST)
else if ($url == '/entrar' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $authCtrl->login(); // Processa login
} 
// Exibe a página de login
else if ($url == '/entrar') {
    // Se o usuário já estiver logado, redireciona para o dashboard
    if (isset($_SESSION['usuario_email'])) {
        header('Location: /dashboard');
        exit;
    }
    // Se não estiver logado, renderiza a página de login
    render_sem_login('auth/login.php', ['title' => 'Entrar no sistema - ']);
} 
// Rota para logout
else if ($url == '/sair')  {
    $authCtrl->logout();
} 
    
// 
// ROTAS DE USUÁRIOS
//

// Lista de usuários
else if ($url == "/usuarios"){
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão (não pode ser Cliente)
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página
    $usuarios = $usuarioCtrl->listar();    

}
// Relatório de usuários
else if ($url == "/usuarios/relatorio"){
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão (não pode ser Cliente)
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página
    $usuarios = $usuarioCtrl->relatorio();

}
// Formulário para cadastrar novo usuário
else if ($url == "/usuarios/novo") {
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão (não pode ser Cliente)
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página
    $usuarioCtrl->novo();
}
// Salva novo usuário (método POST)
else if ($url == "/usuarios/salvar" && $_SERVER['REQUEST_METHOD'] == 'POST'){
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão (não pode ser Cliente)
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, processa o salvamento
    $usuarios = $usuarioCtrl->salvar();
}
// Formulário para editar usuário
// preg_match utiliza uma expressão regular para extrair um valor de uma string
else if (preg_match('#^/usuarios/(\d+)/editar$#', $url, $num)){
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão (não pode ser Cliente)
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página de edição
    $usuarioCtrl->editar($num[1]);
}
// Atualiza usuário existente (método POST)
// O request_method é utilizado para verificar se o método POST, que é o método utilizado para enviar dados ao servidor
else if (preg_match('#^/usuarios/(\d+)/atualizar$#', $url, $num) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuarioCtrl->atualizar($num[1]);
}
// Deleta usuário fisicamente
else if (preg_match('#^/usuarios/(\d+)/del-fisico$#', $url, $num)){
    $usuarioCtrl->deleteFisico($num[1]);
}
// Deleta usuário logicamente (desativa)
else if (preg_match('#^/usuarios/(\d+)/del-logico$#', $url, $num)){
    $usuarioCtrl->deleteLogico($num[1]);
} 

//
// ROTAS DE PRODUTOS
//

// Lista de produtos
else if ($url == "/produtos"){
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão (não pode ser Cliente)
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página
    $produtos = $produtoCtrl->listar();

}
// Relatório de produtos
else if ($url == "/produtos/relatorio"){
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão (não pode ser Cliente)
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página
    $produtos = $produtoCtrl->relatorio();

}
// Formulário para cadastrar novo produto
else if ($url == "/produtos/novo"){
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão (não pode ser Cliente)
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página
    $produtos = $produtoCtrl->novo();

}
// Salva novo produto (método POST)
else if ($url == "/produtos/salvar" && $_SERVER['REQUEST_METHOD'] == 'POST'){
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão (não pode ser Cliente)
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, processa o salvamento
    $produtos = $produtoCtrl->salvar();
}

// Formulário para editar produto
// preg_match utiliza uma expressão regular para extrair um valor de uma string
else if (preg_match('#^/produtos/(\d+)/editar$#', $url, $num)){
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão (não pode ser Cliente)
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página de edição
    $produtoCtrl->editar($num[1]);
}
// Atualiza produto existente (método POST)
// O request_method é utilizado para verificar se o método POST, que é o método utilizado para enviar dados ao servidor
else if (preg_match('#^/produtos/(\d+)/atualizar$#', $url, $num) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $produtoCtrl->atualizar($num[1]);
}
// Deleta produto fisicamente
else if (preg_match('#^/produtos/(\d+)/del-fisico$#', $url, $num)){
    $produtoCtrl->deleteFisico($num[1]);
}
// Deleta produto logicamente (desativa)
else if (preg_match('#^/produtos/(\d+)/del-logico$#', $url, $num)){
    $produtoCtrl->deleteLogico($num[1]);
}

//
// ROTAS DE VENDAS
//

// Lista de vendas
else if ($url == "/vendas"){
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão (não pode ser Cliente)
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página 
    $vendas = $vendaCtrl->listar();

}
// Relatório de vendas
else if ($url == "/vendas/relatorio"){
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão (não pode ser Cliente)
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página 
    $vendas = $vendaCtrl->relatorio();

}
// Formulário para registrar nova venda
else if ($url == "/vendas/novo"){
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão (não pode ser Cliente)
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página 
    $vendas = $vendaCtrl->novo();

}
// Salva nova venda (método POST)
else if ($url == "/vendas/salvar" && $_SERVER['REQUEST_METHOD'] == 'POST'){
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão (não pode ser Cliente)
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, processa o salvamento
    $vendas = $vendaCtrl->salvar();
}

// Formulário para editar venda
// preg_match utiliza uma expressão regular para extrair um valor de uma string
else if (preg_match('#^/vendas/(\d+)/editar$#', $url, $num)){
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão (não pode ser Cliente)
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página de edição
    $vendaCtrl->editar($num[1]);
}
// Atualiza venda existente (método POST)
// O request_method é utilizado para verificar se o método POST, que é o método utilizado para enviar dados ao servidor
else if (preg_match('#^/vendas/(\d+)/atualizar$#', $url, $num) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $vendaCtrl->atualizar($num[1]);
}
// Deleta venda fisicamente
else if (preg_match('#^/vendas/(\d+)/del-fisico$#', $url, $num)){
    $vendaCtrl->deleteFisico($num[1]);
}
// Deleta venda logicamente (desativa)
else if (preg_match('#^/vendas/(\d+)/del-logico$#', $url, $num)){
    $vendaCtrl->deleteLogico($num[1]);
}

//
// ROTA PADRÃO (404)
//

else {
    // Se não encontrar a rota, retorna 404
    http_response_code(404);
    echo '<h1>404 - Página não encontrada</h1>';
    exit;
}