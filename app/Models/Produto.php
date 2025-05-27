<?php

// Informa em qual área da memória vai ficar alocado
namespace App\Models;

// Importa o Arquivo de BD para ser utilizado nesta classe
use App\Core\Database;

// Importa a classe de BD do PHP
use PDO;
use PDOException;

class Produto {

    // Busca todos os usuários
    public static function buscarTodos(){
        // Inicia a conexão com o banco de dados
        $pdo = Database::conectar();

        // Monta o Script SQL de consulta
        $sql = "SELECT * FROM produtos WHERE delete_at IS NULL";

        // Retorna o resultado do SQL
        return $pdo->query($sql)->fetchAll();

    }
    
    //Salva um usuario no BD com os dados da View
    public static function salvar($dados)
    {
        try {
            $pdo = Database::conectar();

            $sql = "INSERT INTO
    produtos (
        nome,
        preco,
        tipo,
        estoque
    )";
$sql .= "VALUES (
        :nome,
        :preco,
        :tipo,
        :estoque
    )";

            // prepara o SQL para ser inserido no BD limpando códigos maliciosos
            $stmt = $pdo->prepare($sql);

            //Passa os dados das variaveis para o INSERT do sql
            $stmt->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
            $stmt->bindParam(':preco', $dados['preco'], PDO::PARAM_STR);
            $stmt->bindParam(':tipo', $dados['tipo'], PDO::PARAM_STR);
            $stmt->bindParam(':estoque', $dados['estoque'], PDO::PARAM_INT);
            //Executa o SQL no Banco de dados
            $stmt->execute();

            //retorna o ID do registro no BD
            return (int) $pdo->lastInsertId();
        } catch (PDOException $e) {
            echo "Erro ao inserir: " . $e->getMessage();
            exit;
        }
    }
}

