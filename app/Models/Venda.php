<?php

namespace App\Models;

use App\Core\Database;
use PDO;
use PDOException;

class Venda {
    // Busca todas as vendas com os nomes de usuário e produto
    public static function buscarTodos() {
        $pdo = Database::conectar();

        $sql = "
            SELECT
                vendas.id_venda,
                usuarios.nome AS nome_usuario,
                produtos.nome AS nome_produto,
                produtos.preco AS preco_produto,
                vendas.quantidade,
                vendas.data_venda,
                vendas.forma_pagamento
            FROM vendas
            INNER JOIN usuarios ON vendas.usuario_id = usuarios.id_usuario
            INNER JOIN produtos ON vendas.produto_id = produtos.id_produto
            WHERE vendas.delete_at IS NULL
            ORDER BY vendas.data_venda DESC
        ";

        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Busca uma venda específica
    public static function buscarUm($id) {
        $pdo = Database::conectar();

        $sql = "
            SELECT
                id_venda,
                usuario_id,
                produto_id,
                quantidade,
                data_venda,
                forma_pagamento
            FROM vendas
            WHERE delete_at IS NULL AND id_venda = :id
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Salvar nova venda
    public static function salvar($dados) {
        try {
            $pdo = Database::conectar();

            $sql = "
                INSERT INTO vendas (
                    usuario_id,
                    produto_id,
                    quantidade,
                    data_venda,
                    forma_pagamento
                ) VALUES (
                    :usuario_id,
                    :produto_id,
                    :quantidade,
                    :data_venda,
                    :forma_pagamento
                )
            ";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':usuario_id', $dados['usuario_id'], PDO::PARAM_INT);
            $stmt->bindParam(':produto_id', $dados['produto_id'], PDO::PARAM_INT);
            $stmt->bindParam(':quantidade', $dados['quantidade'], PDO::PARAM_INT);
            $stmt->bindParam(':data_venda', $dados['data_venda']);
            $stmt->bindParam(':forma_pagamento', $dados['forma_pagamento']);

            $stmt->execute();
            return (int) $pdo->lastInsertId();
        } catch (PDOException $e) {
            echo "Erro ao inserir: " . $e->getMessage();
            exit;
        }
    }

    // Atualizar venda existente
    public static function atualizar($dados) {
        try {
            $pdo = Database::conectar();

            $sql = "
                UPDATE vendas SET
                    usuario_id = :usuario_id,
                    produto_id = :produto_id,
                    quantidade = :quantidade,
                    data_venda = :data_venda,
                    forma_pagamento = :forma_pagamento
                WHERE id_venda = :id_venda
            ";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':usuario_id', $dados['usuario_id'], PDO::PARAM_INT);
            $stmt->bindParam(':produto_id', $dados['produto_id'], PDO::PARAM_INT);
            $stmt->bindParam(':quantidade', $dados['quantidade'], PDO::PARAM_INT);
            $stmt->bindParam(':data_venda', $dados['data_venda']);
            $stmt->bindParam(':forma_pagamento', $dados['forma_pagamento']);
            $stmt->bindParam(':id_venda', $dados['id_venda'], PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao alterar: " . $e->getMessage();
            exit;
        }
    }

    // Exclusão lógica
    public static function deletarLogico($id) {
        $pdo = Database::conectar();
        $sql = "UPDATE vendas SET delete_at = NOW() WHERE id_venda = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Exclusão física
    public static function deletarFisico($id) {
        $pdo = Database::conectar();
        $sql = "DELETE FROM vendas WHERE id_venda = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
