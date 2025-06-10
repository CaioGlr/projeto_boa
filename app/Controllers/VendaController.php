<?php 

namespace App\Controllers;

//Importa o Model para ser utilizado.
use App\Models\Venda;

class VendaController{
    //exibe a lista de vendas
    public function listar(){
        //Chama a Model de venda e executa a busca no BD
        $vendas = Venda::buscarTodos();

        //Exibe o arquivo PHP de lista enviando as vendas do BD para apresentação.
        render('vendas/lista_vendas.php', [
            'title' => 'Listagem de Vendas - Comida Boa',
            "vendas" => $vendas]);
    }    
//EXIBE O RELATÓRIO DE VENDAS
    public function relatorio(){
        //Chama a Model de Vendas e executa a busca no BD
        $vendas = Venda::buscarTodos();

        //Exibe o arquivo PHP de lista enviando os Vendas do BD para apresentação.
        render("vendas/rel_vendas.php", [
            'title' => 'Relatório de Vendas - Comida Boa',
            "vendas" => $vendas]);
    }

     //Abre o formulário para criar uma venda
     public function novo(){
        render('vendas/form_vendas.php', ['title' => 'Registro de Vendas - Comida Boa']);
    }

     //salva uma nova venda no BD
    public function salvar(){
    
        // 1. Sanatização (Remove tudo que não for texto puro, evita golpes)
        $dados = [
            'id_Produto' => filter_input(INPUT_POST, 'id_Produto', FILTER_SANITIZE_SPECIAL_CHARS),
            'quantidade' => filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_SPECIAL_CHARS),
            'data_venda' => filter_input(INPUT_POST, 'data_venda', FILTER_SANITIZE_SPECIAL_CHARS),
            'id_venda' => filter_input(INPUT_POST, 'id_venda', FILTER_SANITIZE_SPECIAL_CHARS),
            'id_usuario' => filter_input(INPUT_POST, 'id_usuario', FILTER_SANITIZE_SPECIAL_CHARS),
            'forma_pagamento_id' => filter_input(INPUT_POST, 'forma_pagamento_id', FILTER_SANITIZE_SPECIAL_CHARS),

        ];

        //print_r($_POST);exit();
        //Aqui vamos fazer validações
        $erros = $this->validar($dados);

        if(!empty($erros)) {   
            //Envia os erros para a página de cadastro
            $_SESSION['erros'] = $erros;
            // Envia os dados já informados para serem incluidos
            $_SESSION['dados'] = $dados;
            // Redireciona para a página de cadastro
            header('Location: /vendas/novo');
        }else{

            //chama o model passando os dados
        Venda::salvar($dados);
         $_SESSION['mensagem'] = "Vendas: " . $dados['nome'] . ", cadastrado com sucesso!";
         $_SESSION['tipo_mensagem'] = "success";
        header('Location: /vendas');
        }
    }

    public function editar($id)
    {
          $dados = Venda::BuscarUm($id);
          render("vendas/form_vendas.php", [
            'title' => 'Alterar Vendas - Comida Boa',
            "dados" => $dados
          ]);

    }

    public function atualizar($id){
     // 1. Sanatização (Remove tudo que não for texto puro, evita golpes)
        $dados = [
            'id_Produto' => filter_input(INPUT_POST, 'id_Produto', FILTER_SANITIZE_SPECIAL_CHARS),
            'quantidade' => filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_SPECIAL_CHARS),
            'data_venda' => filter_input(INPUT_POST, 'data_venda', FILTER_SANITIZE_SPECIAL_CHARS),
            'id_venda' => filter_input(INPUT_POST, 'id_venda', FILTER_SANITIZE_SPECIAL_CHARS),
            'id_usuario' => filter_input(INPUT_POST, 'id_usuario', FILTER_SANITIZE_SPECIAL_CHARS),
            'forma_pagamento_id' => filter_input(INPUT_POST, 'forma_pagamento_id', FILTER_SANITIZE_SPECIAL_CHARS),

        ];

        
        //print_r($_POST);exit();
        //Aqui vamos fazer validações
        $erros = $this->validar($dados);

        if(!empty($erros)) {   
            //Envia os erros para a página de cadastro
            $_SESSION['erros'] = $erros;
            // Envia os dados já informados para serem incluidos
            $_SESSION['dados'] = $dados;
            // Redireciona para a página de cadastro
            header('Location: /vendas/' . $id . '/editar');
        }else{
        
        //Chama o model passando os dados
        //Adiciona o ID do usuário para atualizar
        $dados['id_venda'] = $id; 
        Venda::atualizar($dados);
         $_SESSION['mensagem'] = "Usuário: " . $dados['nome'] . ", alterado com sucesso!";
         $_SESSION['tipo_mensagem'] = "success";
        header('Location: /vendas');
        }  
    }

    //Apenas coloca a data da exclusão no BD
    public function deleteLogico($id)
    {
      Venda::deletarLogico($id);
      header('Location: /Vendas');
    }
    //Exclui definitvamente o usuário da tabela
    public function deleteFisico($id)
    {
      Venda::deletarFisico($id);
      header('Location: /vendas');
  
    }

    
    // Implementa a validação e sanitização dos dados do form (limpeza de segurança)
     public function validar($dados){
        $erros = [];

        //Validação do nome
    if(empty($dados['nome'])){
       $erros[] = "O nome é obrigatório!";
     } else if (strlen($dados['nome']) < 3){
       $erros[] = "O nome deve ter pelo menos 3 caracteres!";
     }
     
     
     // Validação do Tipo
     if(empty($dados['tipo'])){
        $erros[] = "O Tipo do Usuário é obrigatório!";
     } else if (!in_array($dados['tipo'], ['Administrador', 'Funcionário', 'Cliente'])){
        $erros[] = "O Tipo do Usuário é Inválido!";
     }
    }
}