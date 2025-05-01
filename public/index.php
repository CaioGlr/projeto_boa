<?php
// Importa o autoload do Composer para carregar as rotas
require __DIR__ . '/../vendor/autoload.php';

use App\Models\Usuario;

// Injeta o conteúdo das páginas de rota dentro do template base.php
function render($view, $data = []) {
    extract($data);
    ob_start();
    // Carrega a página da rota
    require __DIR__ . '/../app/Views/' . $view;
    $content = ob_get_clean();
    // Carrega o template base.php
    require __DIR__ . '/../app/Views/layouts/base.php';
}

function render_sem_login($view, $data = []) {
    extract($data);
    ob_start();
    $content = ob_get_clean();
    // Carrega a página da rota
    require __DIR__ . '/../app/Views/' . $view;
    // Carrega o template base.php
    require __DIR__ . '/../app/Views/layouts/base.php';
}

// Obtem a URL da requisição da navegação
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($url == "/home"){
    render_sem_login('home.php', ['title' => 'Página Inicial - Comida Boa']);
} else if ($url == '/sobre'){
    render_sem_login('sobre.php', ['title' => 'Sobre o Sistema - Comida Boa']);
} else if ($url == '/entrar'){
    render_sem_login('auth/login.php', ['title' => 'Entrar o Sistema - Comida Boa']);
} else if ($url == "/dashboard"){
    render('dashboard.php', ['title' => 'Dashboard - Comida Boa']);
}  else if ($url == "/cardapio"){
    render_sem_login('cardapio.php', ['title' => 'Cardapio - Comida Boa']);
}
// Rotas de usuários

  else if ($url == "/usuarios"){
    $usuarios = Usuario::buscarTodos();
    render('usuarios/listagemusuarios.php', ['
    title' => 'Listagem de Usuários - Comida Boa',
    "usuarios" => $usuarios]);

    
} else if ($url == "/usuarios/novo"){
    render_sem_login('usuarios/formulario.php', ['title' => 'Cadastro de Usuários - Comida Boa']);
} else if ($url == "/usuarios/editar"){
    render_sem_login('usuarios/formulario.php', ['title' => 'Cadastro de Usuários - Comida Boa']);
} else if ($url == "/usuarios/deletar"){
    render('usuarios/listagemusuarios.php', ['title' => 'Listagem de Usuários - Comida Boa']);
} 
// Rotas de produtos
else if ($url == "/produtos"){
    render('produtos/listagemprodutos.php', ['title' => 'Listagem de Produtos - Comida Boa']);
} else if ($url == "/produtos/novo"){
    render('produtos/produtos.php', ['title' => 'Cadastro de Produtos - Comida Boa']);
} else if ($url == "/produtos/editar"){
    render('produtos/produtos.php', ['title' => 'Cadastro de Produtos - Comida Boa']);
} else if ($url == "/produtos/deletar"){
    render('produtos/listagemprodutos.php', ['title' => 'Listagem de Produtos - Comida Boa']);
}
// Rotas de vendas
else if ($url == "/vendas"){
    render('vendas/listagemvendas.php', ['title' => 'Listagem de Vendas - Comida Boa']);
} else if ($url == "/vendas/novo"){
    render('vendas/vendas.php', ['title' => 'Cadastro de Usuários - Vendas']);
} else if ($url == "/vendas/editar"){
    render('vendas/vendas.php', ['title' => 'Cadastro de Usuários - Vendas']);
} else if ($url == "/vendas/deletar"){
    render('vendas/listagemvendas.php', ['title' => 'Listagem de Usuários - Vendas']);
}


//Outras rotas entram aqui...
else {
    // Se não encontrar a rota, retorna 404
    http_response_code(404);
    echo '<h1>404 - Página não encontrada</h1>';
   // render('404.php', ['title' => 'Página não encontrada - Comida Boa']);
    exit;
}