<?php
session_start();
// Importa o autoload do Composer para carregar as rotas
require __DIR__ . '/../vendor/autoload.php';

// Importa o arquivo de configuração do banco de dados
use App\Controllers\ProdutoController;
// Instacia o Controller de Produtos para ser utilizado (cria objeto)
$produtoCtrl = new  ProdutoController();

use App\Controllers\UsuarioController;
// Instacia o Controller de Usuário para ser utilizado (cria objeto)
$usuarioCtrl = new UsuarioController();

use App\Controllers\VendaController;
// Instacia o Controller de Vendas para ser utilizado (cria objeto)
$vendaCtrl = new VendaController();

use App\Controllers\AuthController;
// Instacia o Controller de Autenticação para ser utilizado (cria objeto)
$authCtrl = new AuthController();

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
}

// Obtem a URL da requisição da navegação
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Páginas Principais (publicas)
if ($url == "/home"){
    render_sem_login('home.php', ['title' => 'Página Inicial - Comida Boa']);
} else if ($url == '/sobre'){
    render_sem_login('sobre.php', ['title' => 'Sobre o Sistema - Comida Boa']);
} else if ($url == "/cardapio"){
    render_sem_login('cardapio.php', ['title' => 'Cardapio - Comida Boa']);
}

// Usuário logado
else if ($url == "/dashboard") {
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        header('Location: /entrar');
        exit;
    }
    // Se estiver logado, renderiza a página do dashboard
    render('dashboard.php', ['title' => 'Dashboard - Comida Boa']);
}    
  // Se não estiver logado, redireciona para a página de login
     else if ($url == '/usuarios') {
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {    // Se não estiver logado,
    header('Location: /entrar');
    exit;
    }   
}


// Authenticação
else if ($url == '/entrar' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $authCtrl->login(); // Processa login
} else if ($url == '/entrar') {
    if (isset($_SESSION['usuario_email'])) {
        header('Location: /dashboard');
        exit;
    }
    render_sem_login('auth/login.php', ['title' => 'Entrar no sistema - ']);
} else if ($url == '/sair')  {
    $authCtrl->logout();
}
    

// Rotas de usuários
else if ($url == "/usuarios"){
    $usuarios = $usuarioCtrl->listar();
}else if ($url == "/usuarios/relatorio"){
    $usuarios = $usuarioCtrl->relatorio();
}else if ($url == "/usuarios/novo"){
    $usuarios = $usuarioCtrl->novo();
}else if ($url == "/usuarios/salvar" && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuarios = $usuarioCtrl->salvar();
}
// preg_match utiliza uma expressão regular para extrair um valor de uma string
else if (preg_match('#^/usuarios/(\d+)/editar$#', $url, $num)){
    $usuarioCtrl->editar($num[1]);
}else if (preg_match('#^/usuarios/(\d+)/atualizar$#', $url, $num) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuarioCtrl->atualizar($num[1]);
}else if (preg_match('#^/usuarios/(\d+)/del-fisico$#', $url, $num)){
    $usuarioCtrl->deleteFisico($num[1]);
}else if (preg_match('#^/usuarios/(\d+)/del-logico$#', $url, $num)){
    $usuarioCtrl->deleteLogico($num[1]);
}

// Rotas de produtos
else if ($url == "/produtos"){
    $produtos = $produtoCtrl->listar();
}else if ($url == "/produtos/relatorio"){
    $produtos = $produtoCtrl->relatorio();
}else if ($url == "/produtos/novo"){
    $produtos = $produtoCtrl->novo();
}else if ($url == "/produtos/salvar" && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $produtos = $produtoCtrl->salvar();
}

// preg_match utiliza uma expressão regular para extrair um valor de uma string
else if (preg_match('#^/produtos/(\d+)/editar$#', $url, $num)){
    $produtoCtrl->editar($num[1]);
}
// O request_method é utilizado para verificar se o método POST, que é o método utilizado para enviar dados ao servidor
else if (preg_match('#^/produtos/(\d+)/atualizar$#', $url, $num) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $produtoCtrl->atualizar($num[1]);
}else if (preg_match('#^/produtos/(\d+)/del-fisico$#', $url, $num)){
    $produtoCtrl->deleteFisico($num[1]);
}else if (preg_match('#^/produtos/(\d+)/del-logico$#', $url, $num)){
    $produtoCtrl->deleteLogico($num[1]);
}



// Rotas de vendas
else if ($url == "/vendas"){
    $vendas = $vendaCtrl->listar();
}else if ($url == "/vendas/relatorio"){
    $vendas = $vendaCtrl->relatorio();
}else if ($url == "/vendas/novo"){
    $vendas = $vendaCtrl->novo();
}else if ($url == "/vendas/salvar" && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $vendas = $vendaCtrl->salvar();
}

// preg_match utiliza uma expressão regular para extrair um valor de uma string
else if (preg_match('#^/vendas/(\d+)/editar$#', $url, $num)){
    $vendaCtrl->editar($num[1]);}
// O request_method é utilizado para verificar se o método POST, que é o método utilizado para enviar dados ao servidor
else if (preg_match('#^/vendas/(\d+)/atualizar$#', $url, $num) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $vendaCtrl->atualizar($num[1]);
}else if (preg_match('#^/vendas/(\d+)/del-fisico$#', $url, $num)){
    $vendaCtrl->deleteFisico($num[1]);
}else if (preg_match('#^/vendas/(\d+)/del-logico$#', $url, $num)){
    $vendaCtrl->deleteLogico($num[1]);
}

//Outras rotas entram aqui...
else {
    // Se não encontrar a rota, retorna 404
    http_response_code(404);
    echo '<h1>404 - Página não encontrada</h1>';
   // render('404.php', ['title' => 'Página não encontrada - Comida Boa']);
    exit;
}