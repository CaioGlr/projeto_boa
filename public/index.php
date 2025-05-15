<?php
session_start();
// Importa o autoload do Composer para carregar as rotas
require __DIR__ . '/../vendor/autoload.php';
use App\Controllers\ProdutoController;
$produtosCtrl = new  ProdutoController();

use App\Controllers\UsuarioController;
// Instacia o Controller de Usuário para ser utilizado (cria objeto)
$usuarioCtrl = new UsuarioController();

use App\Controllers\VendaController;
$vendaCtrl = new VendaController();

// Injeta o conteúdo das páginas de rota dentro do template base.php
function render($view, $data = [])
{
    extract($data);
    ob_start();
    // Carrega a página da rota
    require __DIR__ . '/../app/Views/' . $view;
    $content = ob_get_clean();
    // Carrega o template base.php
    require __DIR__ . '/../app/Views/layouts/base.php';
}

function render_sem_login($view, $data = [])
{
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
    $usuarios = $usuarioCtrl->listar();
    render("usuarios/listagemusuarios.php", ['title' => 'Listagem de Usuários - Comida Boa']);
}
 else if ($url == "/usuarios/novo"){
    $usuarios = $usuarioCtrl->novo();
    render_sem_login('usuarios/formulario.php', ['title' => 'Cadastro de Usuários - Comida Boa']);
}
 else if ($url == "/usuarios/editar"){
    render_sem_login('usuarios/formulario.php', ['title' => 'Cadastro de Usuários - Comida Boa']);
} 

else if ($url == "/usuarios/deletar")
{ 
    
} else if ($url == "/usuarios/salvar" && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuarios = $usuarioCtrl->salvar();
}


// Rotas de produtos
else if ($url == "/produtos"){
    $produtos = $produtosCtrl->listar();
    render('produtos/listagemprodutos.php', ['title' => 'Listagem de Produtos - Comida Boa']);
}

else if ($url == "/produtos/novo"){
    $produto = $produtoCtrl->novo();
    render('produtos/produtos.php', ['title' => 'Cadastro de Produtos - Comida Boa']);
} 

else if ($url == "/produtos/editar"){
    render('produtos/produtos.php', ['title' => 'Cadastro de Produtos - Comida Boa']);
} 

else if ($url == "/produtos/deletar"){
    render('produtos/listagemprodutos.php', ['title' => 'Listagem de Produtos - Comida Boa']);
}

else if ($url == "/produto/salvar" && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $produto = $produtoCtrl->salvar();
}


// Rotas de vendas
else if ($url == "/vendas"){
    $vendas = $vendaCtrl->listar();
    render('vendas/listagemvendas.php', ['title' => 'Listagem de Vendas - Comida Boa']);
}

else if ($url == "/vendas/novo"){
    $vendas = $vendaCtrl->novo();
    render('vendas/vendas.php', ['title' => 'Cadastro de Usuários - Vendas']);
} 

else if ($url == "/vendas/editar"){
    render('vendas/vendas.php', ['title' => 'Cadastro de Usuários - Vendas']);
} 

else if ($url == "/vendas/deletar"){
    render('vendas/listagemvendas.php', ['title' => 'Listagem de Usuários - Vendas']);
}

else if ($url == "/produto/salvar" && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $vendas = $vendaCtrl->salvar();
}


//Outras rotas entram aqui...
else {
    // Se não encontrar a rota, retorna 404
    http_response_code(404);
    echo '<h1>404 - Página não encontrada</h1>';
   // render('404.php', ['title' => 'Página não encontrada - Comida Boa']);
    exit;
}