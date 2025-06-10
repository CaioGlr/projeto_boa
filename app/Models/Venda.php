<?php

// Informa em qual área da memória vai ficar alocado
namespace App\Models;

// Importa o Arquivo de BD para ser utilizado nesta classe
use App\Core\Database;

// Importa a classe de BD do PHP
use PDO;
use PDOException;

class Venda {

    // Busca todos os usuários
    public static function buscarTodos(){
        // Inicia a conexão com o banco de dados
        $pdo = Database::conectar();

        // Monta o Script SQL de consulta
        $sql = "SELECT * FROM vendas WHERE delete_at IS NULL";

        // Retorna o resultado do SQL
        return $pdo->query($sql)->fetchAll();

    }

    public static function BuscarUm($id)
    {
        // Inicia a conexão com o BD
        $pdo = Database::conectar();

        $sql = "SELECT * FROM vendas WHERE delete_at IS NULL AND id_venda = :id";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch();
    }

    //Salva um usuario no BD com os dados da View
    public static function salvar($dados)
    {
        try {
            $pdo = Database::conectar();

            $sql = "INSERT INTO
    vendas (
        id_venda,
        id_usuario,
        id_produto,
        quantidade,
        data_venda,
        forma_pagamento_id
    )";
$sql .= "VALUES (
        :id_venda,
        :id_usuario,
        :id_produto,
        :quantidade,
        :data_venda,
        :forma_pagamento_id
    )";

            // prepara o SQL para ser inserido no BD limpando códigos maliciosos
            $stmt = $pdo->prepare($sql);

            //Passa os dados das variaveis para o INSERT do sql
            $stmt->bindParam(':id_venda', $dados['id_venda'], PDO::PARAM_STR);
            $stmt->bindParam(':id_usuario', $dados['id_usuario'], PDO::PARAM_STR);
            $stmt->bindParam(':data_venda', $dados['data_venda']);
            $stmt->bindParam(':id_produto', $dados['id_produto'], PDO::PARAM_STR);
            $stmt->bindParam(':quantidade', $dados['quantidade'], PDO::PARAM_STR);
            $stmt->bindParam(':forma_pagamento_id', $dados['forma_pagamento_id'], PDO::PARAM_STR);

            //Executa o SQL no Banco de dados
            $stmt->execute();

            //retorna o ID do registro no BD
            return (int) $pdo->lastInsertId();
        } catch (PDOException $e) {
            echo "Erro ao inserir: " . $e->getMessage();
            exit;
        }
    }

        public static function atualizar($dados)
        {
            try{
                $pdo = Database::conectar();

                $sql = "UPDATE vendas SET ";
                $sql .= "id_venda = :id_venda, ";
                $sql .= "id_usuario = :id_usuario, ";
                $sql .= "data_venda = :data_venda, ";
                $sql .= "id_produto = :id_produto, ";
                $sql .= "quantidade = :quantidade, ";
                $sql .= "forma_pagamento_id = :forma_pagamento_id, ";

                $sql .= "WHERE id_usuario = :id; ";

                $stmt = $pdo->prepare($sql);

                $stmt->bindParam(':id_venda', $dados['id_venda'], PDO::PARAM_STR);
                $stmt->bindParam(':id_usuario', $dados['id_usuario'], PDO::PARAM_STR);
                $stmt->bindParam(':data_venda', $dados['data_venda']);
                $stmt->bindParam(':id_produto', $dados['id_produto'], PDO::PARAM_STR);
                $stmt->bindParam(':quantidade', $dados['quantidade'], PDO::PARAM_STR);
                $stmt->bindParam(':forma_pagamento_id', $dados['forma_pagamento_id'], PDO::PARAM_STR);

                $stmt->bindParam(':id', $dados['id_vendas'], PDO::PARAM_INT);

            return $stmt->execute();

            }catch(PDOException $e){
                echo "Erro ao alterar: " . $e->getMessage();
                exit;
            }

        }
    
        public static function deletarLogico($id) 
        {
            $pdo = Database::conectar();
            $sql = "UPDATE vendas SET delete_at = NOW() WHERE id_vendas = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }

        public static function deletarFisico($id)
        {
            $pdo = Database::conectar($id);
            $sql = "DELETE FROM vendas WHERE id_vendas = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }
}
