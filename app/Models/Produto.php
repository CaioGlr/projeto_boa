<?php
// Model responsável pelas operações de produtos no banco de dados

// Informa em qual área da memória vai ficar alocado
namespace App\Models;

// Importa o Arquivo de BD para ser utilizado nesta classe
use App\Core\Database;

// Importa a classe de BD do PHP
use PDO;
use PDOException;

class Produto
{
    // Busca todos os produtos ativos no banco de dados
    public static function buscarTodos()
    {
        // Inicia a conexão com o banco de dados
        $pdo = Database::conectar();

        // Query SQL para buscar todos os produtos não deletados
        $sql = "SELECT * FROM produtos WHERE deleted_at IS NULL";

        // Executa a query e retorna todos os resultados
        // A query busca todos os produtos que não foram marcados como deletados
        return $pdo->query($sql)->fetchAll();
    }

    // Busca um produto específico pelo ID
    public static function BuscarUm($id)
    {
        // Inicia a conexão com o banco de dados
        $pdo = Database::conectar();

        // Query SQL para buscar um produto específico
        $sql = "SELECT * FROM produtos WHERE deleted_at IS NULL AND id_produto = :id";

        // Prepara a query para execução
        $stmt = $pdo->prepare($sql);

        // Vincula o parâmetro ID à query
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        // Executa a query
        $stmt->execute();

        // Retorna o resultado da query
        return $stmt->fetch();
    }

    // Salva um novo produto no banco de dados
    public static function salvar($dados)
    {
        try {
            // Inicia a conexão com o banco de dados
            $pdo = Database::conectar();

            // Query SQL para inserir um novo produto
            $sql = "INSERT INTO produtos (
                nome,
                preco,
                tipo,
                estoque
            ) VALUES (
                :nome,
                :preco,
                :tipo,
                :estoque
            )";

            // Prepara a query para execução
            $stmt = $pdo->prepare($sql);

            // Vincula os parâmetros à query
            $stmt->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
            $stmt->bindParam(':preco', $dados['preco'], PDO::PARAM_STR);
            $stmt->bindParam(':tipo', $dados['tipo'], PDO::PARAM_STR);
            $stmt->bindParam(':estoque', $dados['estoque'], PDO::PARAM_INT);
            
            // Executa a query
            $stmt->execute();

            // Retorna o ID do produto inserido
            return (int) $pdo->lastInsertId();
        } catch (PDOException $e) {
            // Em caso de erro, exibe a mensagem e para a execução
            echo "Erro ao inserir: " . $e->getMessage();
            exit;
        }
    }

    // Atualiza um produto existente no banco de dados
    public static function atualizar($dados)
    {
        try {
            // Inicia a conexão com o banco de dados
            $pdo = Database::conectar();

            // Query SQL para atualizar um produto
            $sql = "UPDATE produtos SET ";
            $sql .= "nome = :nome, ";
            $sql .= "preco = :preco, ";
            $sql .= "tipo = :tipo, ";
            $sql .= "estoque = :estoque ";
            $sql .= "WHERE id_produto = :id; ";

            // Prepara a query para execução
            $stmt = $pdo->prepare($sql);

            // Vincula os parâmetros à query
            $stmt->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
            $stmt->bindParam(':preco', $dados['preco'], PDO::PARAM_STR);
            $stmt->bindParam(':tipo', $dados['tipo'], PDO::PARAM_STR);
            $stmt->bindParam(':estoque', $dados['estoque'], PDO::PARAM_INT);
            $stmt->bindParam(':id', $dados['id_produto'], PDO::PARAM_INT);

            // Executa a query e retorna o resultado
            return $stmt->execute();
        } catch (PDOException $e) {
            // Em caso de erro, exibe a mensagem e para a execução
            echo "Erro ao alterar: " . $e->getMessage();
            exit;
        }
    }

    // Realiza exclusão lógica do produto (marca como deletado)
    public static function deletarLogico($id)
    {
        // Inicia a conexão com o banco de dados
        $pdo = Database::conectar();
        // Query SQL para marcar o produto como deletado
        $sql = "UPDATE produtos SET deleted_at = NOW() WHERE id_produto = :id";
        // Prepara e executa a query
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Realiza exclusão física do produto (remove do banco de dados)
    public static function deletarFisico($id)
    {
        // Inicia a conexão com o banco de dados
        $pdo = Database::conectar();
        // Query SQL para remover o produto do banco de dados
        $sql = "DELETE FROM produtos WHERE id_produto = :id";
        // Prepara e executa a query
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
