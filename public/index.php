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


function render_sem_login($view, $data = [])
{
    // Extrai os dados do array para variáveis individuais
    extract($data);
    // Inicia o buffer de saída para capturar o conteúdo da página
    ob_start();
    // Se a sessão já estiver iniciada, não inicia novamente
    $content = ob_get_clean();
    // Carrega a página da rota
    require __DIR__ . '/../app/Views/' . $view;
    // Carrega o template base_publico.php
    // Este template é utilizado para páginas que não precisam de autenticação
    require __DIR__ . '/../app/Views/layouts/base_publico.php';
}

// Obtem a URL da requisição da navegação
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Páginas Principais (publicas)
if ($url == "/home"){
    // Renderiza a página inicial, contato e cardapio sem necessidade de autenticação
    render_sem_login('home.php', ['title' => 'Página Inicial - Comida Boa']);
} else if ($url == '/sobre'){
    render_sem_login('sobre.php', ['title' => 'Sobre o Sistema - Comida Boa']);
} else if ($url == "/cardapio"){
    render_sem_login('cardapio.php', ['title' => 'Cardapio - Comida Boa']);
}

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

// Authenticação
// Utiliza o metodo POST para processar o login
else if ($url == '/entrar' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $authCtrl->login(); // Processa login
} else if ($url == '/entrar') {
    // Se o usuário já estiver logado, redireciona para o dashboard
    if (isset($_SESSION['usuario_email'])) {
        header('Location: /dashboard');
        exit;
    }
    // Se não estiver logado, renderiza a página de login
    render_sem_login('auth/login.php', ['title' => 'Entrar no sistema - ']);
    // /sair é a rota para o logout
} else if ($url == '/sair')  {
    $authCtrl->logout();
} 
    
// Rotas de usuários

else if ($url == "/usuarios"){
    // Antes de renderizar a página, verifica se o usuário está logado e tem permissão
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        // Se o usuário não estiver logado, redireciona para a página de login
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        // Redireciona para o dashboard se não tiver permissão
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página
       $usuarios = $usuarioCtrl->listar();    

}else if ($url == "/usuarios/relatorio"){
    // Antes de renderizar a página, verifica se o usuário está logado e tem permissão
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        // Se o usuário não estiver logado, redireciona para a página de login
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        // Redireciona para o dashboard se não tiver permissão
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página
    $usuarios = $usuarioCtrl->relatorio();

}else if ($url == "/usuarios/novo") {
 // Antes de renderizar a página, verifica se o usuário está logado e tem permissão
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        // Se o usuário não estiver logado, redireciona para a página de login
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        // Redireciona para o dashboard se não tiver permissão
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página
    $usuarioCtrl->novo();
}
else if ($url == "/usuarios/salvar" && $_SERVER['REQUEST_METHOD'] == 'POST'){
    // Antes de renderizar a página, verifica se o usuário está logado e tem permissão
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        // Se o usuário não estiver logado, redireciona para a página de login
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        // Redireciona para o dashboard se não tiver permissão
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página
    $usuarios = $usuarioCtrl->salvar();
}
// preg_match utiliza uma expressão regular para extrair um valor de uma string
else if (preg_match('#^/usuarios/(\d+)/editar$#', $url, $num)){
    // Antes de renderizar a página, verifica se o usuário está logado e tem permissão
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        // Se o usuário não estiver logado, redireciona para a página de login
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        // Redireciona para o dashboard se não tiver permissão
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página 
    $usuarioCtrl->editar($num[1]);
// O request_method é utilizado para verificar se o método POST, que é o método utilizado para enviar dados ao servidor    
}else if (preg_match('#^/usuarios/(\d+)/atualizar$#', $url, $num) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuarioCtrl->atualizar($num[1]);
}else if (preg_match('#^/usuarios/(\d+)/del-fisico$#', $url, $num)){
    $usuarioCtrl->deleteFisico($num[1]);
}else if (preg_match('#^/usuarios/(\d+)/del-logico$#', $url, $num)){
    $usuarioCtrl->deleteLogico($num[1]);
} 


// Rotas de produtos
else if ($url == "/produtos"){
    // Antes de renderizar a página, verifica se o usuário está logado e tem permissão
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        // Se o usuário não estiver logado, redireciona para a página de login
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        // Redireciona para o dashboard se não tiver permissão
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página
    $produtos = $produtoCtrl->listar();

}else if ($url == "/produtos/relatorio"){
    // Antes de renderizar a página, verifica se o usuário está logado e tem permissão
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        // Se o usuário não estiver logado, redireciona para a página de login
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        // Redireciona para o dashboard se não tiver permissão
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página
    $produtos = $produtoCtrl->relatorio();

}else if ($url == "/produtos/novo"){
    // Antes de renderizar a página, verifica se o usuário está logado e tem permissão
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        // Se o usuário não estiver logado, redireciona para a página de login
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        // Redireciona para o dashboard se não tiver permissão
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página
    $produtos = $produtoCtrl->novo();

}else if ($url == "/produtos/salvar" && $_SERVER['REQUEST_METHOD'] == 'POST'){
    // Antes de renderizar a página, verifica se o usuário está logado e tem permissão
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        // Se o usuário não estiver logado, redireciona para a página de login
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        // Redireciona para o dashboard se não tiver permissão
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página
    $produtos = $produtoCtrl->salvar();
}

// preg_match utiliza uma expressão regular para extrair um valor de uma string
else if (preg_match('#^/produtos/(\d+)/editar$#', $url, $num)){
    // Antes de renderizar a página, verifica se o usuário está logado e tem permissão
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        // Se o usuário não estiver logado, redireciona para a página de login
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        // Redireciona para o dashboard se não tiver permissão
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página 
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
    // Antes de renderizar a página, verifica se o usuário está logado e tem permissão
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        // Se o usuário não estiver logado, redireciona para a página de login
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        // Redireciona para o dashboard se não tiver permissão
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página 
    $vendas = $vendaCtrl->listar();

}else if ($url == "/vendas/relatorio"){
    // Antes de renderizar a página, verifica se o usuário está logado e tem permissão
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        // Se o usuário não estiver logado, redireciona para a página de login
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        // Redireciona para o dashboard se não tiver permissão
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página 
    $vendas = $vendaCtrl->relatorio();

}else if ($url == "/vendas/novo"){
    // Antes de renderizar a página, verifica se o usuário está logado e tem permissão
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        // Se o usuário não estiver logado, redireciona para a página de login
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        // Redireciona para o dashboard se não tiver permissão
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página 
    $vendas = $vendaCtrl->novo();

}else if ($url == "/vendas/salvar" && $_SERVER['REQUEST_METHOD'] == 'POST'){
    // Antes de renderizar a página, verifica se o usuário está logado e tem permissão
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        // Se o usuário não estiver logado, redireciona para a página de login
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        // Redireciona para o dashboard se não tiver permissão
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página 
    $vendas = $vendaCtrl->salvar();
}

// preg_match utiliza uma expressão regular para extrair um valor de uma string
else if (preg_match('#^/vendas/(\d+)/editar$#', $url, $num)){
    // Antes de renderizar a página, verifica se o usuário está logado e tem permissão
    // Valida se o usuário está logado
    if (!isset($_SESSION['usuario_email'])) {
        // Se o usuário não estiver logado, redireciona para a página de login
        header('Location: /entrar');
        exit;
    }

    // Valida se o usuário tem permissão
    if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'Cliente') {
        $_SESSION['mensagem'] = "Somente Funcionários e Administradores tem acesso!";
        $_SESSION['tipo_mensagem'] = "danger"; // Alerta de erro
        // Redireciona para o dashboard se não tiver permissão
        header('Location: /dashboard');
        exit;
    }

    // Se o usuário estiver logado e tiver permissão, renderiza a página 
    $vendaCtrl->editar($num[1]);}

// O request_method é utilizado para verificar se o método POST, que é o método utilizado para enviar dados ao servidor
else if (preg_match('#^/vendas/(\d+)/atualizar$#', $url, $num) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $vendaCtrl->atualizar($num[1]);
}else if (preg_match('#^/vendas/(\d+)/del-fisico$#', $url, $num)){
    $vendaCtrl->deleteFisico($num[1]);
}else if (preg_match('#^/vendas/(\d+)/del-logico$#', $url, $num)){
    $vendaCtrl->deleteLogico($num[1]);
}

else {
    // Se não encontrar a rota, retorna 404
    http_response_code(404);
    echo '<h1>404 - Página não encontrada</h1>';
   // render('404.php', ['title' => 'Página não encontrada - Comida Boa']);
    exit;
}