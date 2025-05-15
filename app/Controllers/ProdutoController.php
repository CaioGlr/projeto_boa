<?php 

namespace App\Controllers;

//Importa o Model para ser utilizado.
use App\Models\Produto;

class ProdutoController{
    //exibe a lista de usuarios
    public function listar(){
        //Chama a Model de Usuario e executa a busca no BD
        $produtos = Produto::buscarTodos();

        //Exibe o arquivo PHP de lista enviando os usuarios do BD para apresentação.
        render('produtos/listagemprodutos.php', [
            'title' => 'Listagem de Produtos - Comida Boa',
            "produtos" => $produtos]);
    }
}