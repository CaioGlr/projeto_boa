<?php 

namespace App\Controllers;

//Importa o Model para ser utilizado.
use App\Models\Venda;

class VendaController{
    //exibe a lista de usuarios
    public function listar(){
        //Chama a Model de Usuario e executa a busca no BD
        $vendas = Venda::buscarTodos();

        //Exibe o arquivo PHP de lista enviando os usuarios do BD para apresentação.
        render('vendas/listagemvendas.php', [
            'title' => 'Listagem de Vendas - Comida Boa',
            "vendas" => $vendas]);
    }    
}