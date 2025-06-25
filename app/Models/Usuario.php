<?php
// Model responsável pelas operações de usuários no banco de dados

// Informa em qual área da memória vai ficar alocado
namespace App\Models;

// Importa o Arquivo de BD para ser utilizado nesta classe
use App\Core\Database;

// Importa a classe de BD do PHP
use PDO;
use PDOException;

class Usuario
{
    // Busca todos os usuários ativos no banco de dados
    public static function buscarTodos()
    {
        // Inicia a conexão com o banco de dados
        $pdo = Database::conectar();

        // Query SQL para buscar todos os usuários não deletados
        $sql = "SELECT * FROM usuarios WHERE deleted_at IS NULL";

        // Executa a query e retorna todos os resultados
        // A query busca todos os usuários que não foram marcados como deletados
        return $pdo->query($sql)->fetchAll();
    }

    // Busca um usuário específico pelo ID
    public static function BuscarUm($id)
    {
        // Inicia a conexão com o banco de dados
        $pdo = Database::conectar();

        // Query SQL para buscar um usuário específico
        $sql = "SELECT * FROM usuarios WHERE deleted_at IS NULL AND id_usuario = :id";

        // Prepara a query para execução
        $stmt = $pdo->prepare($sql);

        // Vincula o parâmetro ID à query
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        // Executa a query
        $stmt->execute();

        // Retorna o resultado da query
        return $stmt->fetch();
    }

    // Salva um novo usuário no banco de dados
    public static function salvar($dados)
    {
        try {
            // Inicia a conexão com o banco de dados
            $pdo = Database::conectar();

            // Criptografa a senha do usuário antes de salvar
            $senha = password_hash($dados['senha'], PASSWORD_BCRYPT);

            // Query SQL para inserir um novo usuário
            $sql = "INSERT INTO usuarios (
                nome,
                cpf,
                data_nascimento,
                celular,
                rua,
                numero,
                complemento,
                bairro,
                cidade,
                estado,
                cep,
                email,
                senha,
                tipo
            ) VALUES (
                :nome,
                :cpf,
                :data_nascimento,
                :celular,
                :rua,
                :numero,
                :complemento,
                :bairro,
                :cidade,
                :estado,
                :cep,
                :email,
                :senha,
                :tipo
            )";

            // Prepara a query para execução
            $stmt = $pdo->prepare($sql);

            // Vincula os parâmetros à query
            $stmt->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
            $stmt->bindParam(':cpf', $dados['cpf'], PDO::PARAM_STR);
            $stmt->bindParam(':data_nascimento', $dados['data_nascimento']);
            $stmt->bindParam(':celular', $dados['celular'], PDO::PARAM_STR);
            $stmt->bindParam(':rua', $dados['rua'], PDO::PARAM_STR);
            $stmt->bindParam(':numero', $dados['numero'], PDO::PARAM_STR);
            $stmt->bindParam(':complemento', $dados['complemento'], PDO::PARAM_STR);
            $stmt->bindParam(':bairro', $dados['bairro'], PDO::PARAM_STR);
            $stmt->bindParam(':cidade', $dados['cidade'], PDO::PARAM_STR);
            $stmt->bindParam(':estado', $dados['estado'], PDO::PARAM_STR);
            $stmt->bindParam(':cep', $dados['cep'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $dados['email'], PDO::PARAM_STR);
            $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
            $stmt->bindParam(':tipo', $dados['tipo'], PDO::PARAM_STR);

            // Realiza a execução da query
            $stmt->execute();

            // Retorna o ID do usuário inserido
            return (int) $pdo->lastInsertId();
        } catch (PDOException $e) {
            // Em caso de erro, exibe a mensagem e para a execução
            echo "Erro ao inserir: " . $e->getMessage();
            exit;
        }
    }

    // Atualiza um usuário existente no banco de dados
    public static function atualizar($dados)
    {
        try {
            // Inicia a conexão com o banco de dados
            $pdo = Database::conectar();

            // Query SQL para atualizar um usuário
            $sql = "UPDATE usuarios SET 
            nome = :nome,
            cpf = :cpf,
            data_nascimento = :data_nascimento,
            celular = :celular,
            rua = :rua,
            numero = :numero,
            complemento = :complemento,
            bairro = :bairro,
            cidade = :cidade,
            estado = :estado,
            cep = :cep,
            email = :email,
            tipo = :tipo";

            // Se uma nova senha foi fornecida, adiciona ao UPDATE
            if (!empty($dados['senha'])) {
                $sql .= ", senha = :senha";
                $senha = password_hash($dados['senha'], PASSWORD_BCRYPT);
            }

            $sql .= " WHERE id_usuario = :id";

            // Prepara a query para execução
            $stmt = $pdo->prepare($sql);

            // Vincula os parâmetros à query
            $stmt->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
            $stmt->bindParam(':cpf', $dados['cpf'], PDO::PARAM_STR);
            $stmt->bindParam(':data_nascimento', $dados['data_nascimento']);
            $stmt->bindParam(':celular', $dados['celular'], PDO::PARAM_STR);
            $stmt->bindParam(':rua', $dados['rua'], PDO::PARAM_STR);
            $stmt->bindParam(':numero', $dados['numero'], PDO::PARAM_STR);
            $stmt->bindParam(':complemento', $dados['complemento'], PDO::PARAM_STR);
            $stmt->bindParam(':bairro', $dados['bairro'], PDO::PARAM_STR);
            $stmt->bindParam(':cidade', $dados['cidade'], PDO::PARAM_STR);
            $stmt->bindParam(':estado', $dados['estado'], PDO::PARAM_STR);
            $stmt->bindParam(':cep', $dados['cep'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $dados['email'], PDO::PARAM_STR);
            $stmt->bindParam(':tipo', $dados['tipo'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $dados['id_usuario'], PDO::PARAM_INT);

            // Se uma nova senha foi fornecida, vincula o parâmetro
            if (!empty($dados['senha'])) {
                $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
            }

            // Executa a query e retorna o resultado
            return $stmt->execute();
        } catch (PDOException $e) {
            // Em caso de erro, exibe a mensagem e para a execução
            echo "Erro ao alterar: " . $e->getMessage();
            exit;
        }
    }

    // Realiza exclusão lógica do usuário (marca como deletado)
    public static function deletarLogico($id)
    {
        // Inicia a conexão com o banco de dados
        $pdo = Database::conectar();
        // Query SQL para marcar o usuário como deletado
        $sql = "UPDATE usuarios SET deleted_at = NOW() WHERE id_usuario = :id";
        // Prepara e executa a query
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Realiza exclusão física do usuário (remove do banco de dados)
    public static function deletarFisico($id)
    {
        // Inicia a conexão com o banco de dados
        $pdo = Database::conectar();
        // Query SQL para remover o usuário do banco de dados
        $sql = "DELETE FROM usuarios WHERE id_usuario = :id";
        // Prepara e executa a query
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
