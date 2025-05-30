<?php 

namespace App\Controllers;

//Importa o Model para ser utilizado.
use App\Models\Produto;

class ProdutoController{
    //exibe a lista de produtos

    public function listar(){
        //Chama a Model de Produtos e executa a busca no BD
        $produtos = Produto::buscarTodos();

        //Exibe o arquivo PHP de lista enviando os produtos do BD para apresentação.
        render('produtos/listagemprodutos.php', [
            'title' => 'Listagem de Produtos - Comida Boa',
            "produtos" => $produtos]);
    }

    //Abre o formulário para criar um produto
     public function novo(){
        render('produtos/produtos.php', ['title' => 'Cadastro de Produtos - Comida Boa']);
    }
    
    //salva um novo produtos no BD
    public function salvar(){
    
        // 1. Sanatização (Remove tudo que não for texto puro, evita golpes)
        $dados = [
            'nome' => filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS),
            'preco' => filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_SPECIAL_CHARS),
            'tipo' => filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS),
            'estoque' => filter_input(INPUT_POST, 'estoque', FILTER_SANITIZE_NUMBER_INT)
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
            header('Location: /produtos/novo');
        }else{
        
        //chama o model passando os dados
        Produto::salvar($dados);
         $_SESSION['mensagem'] = "O Produto " . $dados['nome'] . ", foi cadastrado com sucesso!";
         $_SESSION['tipo_mensagem'] = "success";
        header('Location: /produtos');
        }
    }

  public function editar($id) 
  {
        $dados = Produto::BuscarUm($id);
        render("produtos/produtos.php", [
        'title' => 'Alterar Produto - Comida Boa',
        "dados" => $dados
    ]);
}

    public function atualizar($id){
        // 1. Sanatização (Remove tudo que não for texto puro, evita golpes)
        $dados = [
            'nome' => filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS),
            'preco' => filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_SPECIAL_CHARS),
            'tipo' => filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS),
            'estoque' => filter_input(INPUT_POST, 'estoque', FILTER_SANITIZE_NUMBER_INT)
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
            header('Location: /produtos/' . $id . '/editar');
        }else{
        
        //Chama o model passando os dados
        //Adiciona o ID do produto para atualização
        $dados['id_produto'] = $id; 
         //Atualiza o produto no banco de dados
        Produto::atualizar($dados);
         $_SESSION['mensagem'] = "O Produto " . $dados['nome'] . ", foi atualizado com sucesso!";
         $_SESSION['tipo_mensagem'] = "success";
        header('Location: /produtos');
        }
    }
    //EXCLUI O PRODUTO NO BANCO DE DADOS
    //Apenas coloca a data da exclusão no BD
    public function deleteLogico($id)
    {
      Produto::deletarLogico($id);
      header('Location: /produtos');
    }
    //Exclui definitvamente o usuário da tabela
    public function deleteFisico($id)
    {
      Produto::deletarFisico($id);
      header('Location: /produtos');
  
    }

    //Implementa a validação e sanitização dos dados do form (limpeza de segurança)
     public function validar($dados){
        $erros = [];

        //Validação do nome
    if(empty($dados['nome'])){
       $erros[] = "O nome é obrigatório!";
     } else if (strlen($dados['nome']) < 3){
       $erros[] = "O nome deve ter pelo menos 3 caracteres!";
     } 
        // Validação do Preço
    if(empty($dados['preco'])){
       $erros[] = "O preço é obrigatório!";
     } else if (!is_numeric($dados['preco']) || $dados['preco'] <= 0){
       $erros[] = "O preço deve ser um número positivo!";
     }
        // Validação do Tipo
    if(empty($dados['tipo'])){
         $erros[] = "O tipo do produto é obrigatório!";
      } else if (!in_array($dados['tipo'], ['Café da Manhã', 'Almoço', 'Janta', 'Bebida', 'Sobremesa', 'Salgados'])){
         $erros[] = "O tipo do produto é inválido!";
      }
          // Validação do Estoque
    if(empty($dados['estoque'])){
       $erros[] = "A quantidade em estoque é obrigatório!";
     } else if (!is_numeric($dados['estoque']) || $dados['estoque'] <= 0){
       $erros[] = "A quantidade em estoque deve ser menor ou igual a zero!";
     }

        return $erros;
     }
}