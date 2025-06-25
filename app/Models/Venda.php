<?php
// Model responsável pelas operações de vendas no banco de dados

// Informa em qual área da memória vai ficar alocado
namespace App\Models;

// Importa as classes necessárias
use App\Core\Database;
use PDO;
use PDOException;

class Venda
{
    // Busca todas as vendas com nomes de usuário e produto
    public static function buscarTodos()
    {
        // Inicia a conexão com o banco de dados
        $pdo = Database::conectar();

        // Query SQL para buscar todas as vendas com JOIN nas tabelas de usuários e produtos
        $sql = "SELECT vendas.*, produtos.nome AS nome_produto, usuarios.nome AS nome_usuario FROM vendas "; 
        $sql .= "INNER JOIN usuarios ON vendas.usuario_id = usuarios.id_usuario "; // Junta com tabela de usuários
        $sql .=  "INNER JOIN produtos ON vendas.produto_id = produtos.id_produto "; // Junta com tabela de produtos
        $sql .=  "WHERE vendas.deleted_at IS NULL"; // Apenas vendas que não foram deletadas

        // Executa a query e retorna todos os resultados
        // A query busca todas as vendas que não foram marcadas como deletadas
        return $pdo->query($sql)->fetchAll();
    }

    // Busca uma venda específica pelo ID
    public static function buscarUm($id)
    {
        // Inicia a conexão com o banco de dados
        $pdo = Database::conectar();

        // Query SQL para buscar uma venda específica com JOIN nas tabelas de usuários e produtos
        $sql = "SELECT * FROM vendas WHERE deleted_at IS NULL AND id_venda = :id";
        // Prepara a query para execução
        $stmt = $pdo->prepare($sql);
        // Vincula o parâmetro ID à query
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        // Executa a query
        $stmt->execute();

        // Retorna o resultado da query
        return $stmt->fetch();
    }

    // Salva uma nova venda no banco de dados
    public static function salvar($dados)
    {
        try {
            // Inicia a conexão com o banco de dados
            $pdo = Database::conectar();

            // Query SQL para inserir uma nova venda
            $sql = "INSERT INTO vendas (usuario_id, produto_id, quantidade, data_venda, forma_pagamento) "; 
            $sql .=  "VALUES (:usuario_id, :produto_id, :quantidade, :data_venda, :forma_pagamento)";

            // Prepara a query para execução no banco de dados
            $stmt = $pdo->prepare($sql);
            // Vincula os parâmetros à query com o tipo de dado adequado
            $stmt->bindParam(':usuario_id', $dados['usuario_id'], PDO::PARAM_INT); // ID do usuário que está realizando a venda
            $stmt->bindParam(':produto_id', $dados['produto_id'], PDO::PARAM_INT); // ID do produto que está sendo vendido
            $stmt->bindParam(':quantidade', $dados['quantidade'], PDO::PARAM_INT); // Quantidade do produto vendido
            $stmt->bindParam(':data_venda', $dados['data_venda']); // Data da venda
            $stmt->bindParam(':forma_pagamento', $dados['forma_pagamento']); // Forma de pagamento utilizada na venda

            //Demais campos...

            // Executa a query
            $stmt->execute();
            // Retorna o ID da venda inserida
            return (int) $pdo->lastInsertId();
        } catch (PDOException $e) {
            // Em caso de erro, exibe a mensagem e para a execução
            echo "Erro ao inserir: " . $e->getMessage();
            exit;
        }
    }

    // Atualiza os dados de uma venda existente
    public static function atualizar($dados)
    {
        try {
            // Inicia a conexão com o banco de dados
            $pdo = Database::conectar();

            // Query SQL para atualizar uma venda
            $sql = "UPDATE vendas SET ";
            $sql .= " usuario_id = :usuario_id,";
            $sql .= " produto_id = :produto_id,";
            $sql .= " quantidade = :quantidade,";
            $sql .= " data_venda = :data_venda,";
            $sql .= " forma_pagamento = :forma_pagamento ";
            $sql .= "WHERE id_venda = :id_venda;";

            // Prepara a query para execução
            $stmt = $pdo->prepare($sql);
            // Vincula os parâmetros à query
            $stmt->bindParam(':usuario_id', $dados['usuario_id'], PDO::PARAM_INT); // ID do usuário que está realizando a venda
            $stmt->bindParam(':produto_id', $dados['produto_id'], PDO::PARAM_INT); // ID do produto que está sendo vendido
            $stmt->bindParam(':quantidade', $dados['quantidade'], PDO::PARAM_INT); // Quantidade do produto vendido
            $stmt->bindParam(':data_venda', $dados['data_venda']); // Data da venda
            $stmt->bindParam(':forma_pagamento', $dados['forma_pagamento']); // Forma de pagamento utilizada na venda
            // Vincula o ID da venda que será atualizada
            $stmt->bindParam(':id_venda', $dados['id_venda'], PDO::PARAM_INT);

            // Executa a query e retorna o resultado
            return $stmt->execute();
        } catch (PDOException $e) {
            // Em caso de erro, exibe a mensagem e para a execução
            echo "Erro ao alterar: " . $e->getMessage();
            exit;
        }
    }

    // Realiza exclusão lógica de uma venda (marca como deletada)
    public static function deletarLogico($id)
    {
        // Inicia a conexão com o banco de dados
        $pdo = Database::conectar();

        // Query SQL para marcar a venda como deletada
        $sql = "UPDATE vendas SET deleted_at = NOW() WHERE id_venda = :id";

        // Prepara e executa a query
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // Realiza exclusão física de uma venda (remove do banco de dados)
    public static function deletarFisico($id)
    {
        // Inicia a conexão com o banco de dados
        $pdo = Database::conectar();

        // Query SQL para remover a venda do banco de dados
        $sql = "DELETE FROM vendas WHERE id_venda = :id";

        // Prepara e executa a query
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
