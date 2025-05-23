<?php

// Informa em qual área da memória vai ficar alocado
namespace App\Models;

// Importa o Arquivo de BD para ser utilizado nesta classe
use App\Core\Database;

// Importa a classe de BD do PHP
use PDO;
use PDOException;

class Usuario
{

    // Busca todos os usuários
    public static function buscarTodos()
    {
        // Inicia a conexão com o banco de dados
        $pdo = Database::conectar();

        // Monta o Script SQL de consulta
        $sql = "SELECT * FROM usuarios WHERE delete_at IS NULL";

        // Retorna o resultado do SQL
        return $pdo->query($sql)->fetchAll();
    }

    //Salva um usuario no BD com os dados da View
    public static function salvar($dados)
    {
        try {
            $pdo = Database::conectar();

            //criptografa a senha do usuário antes de salvar
            $senha = password_hash($dados['senha'], PASSWORD_BCRYPT);


            $sql = "INSERT INTO
    usuarios (
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
    )";
$sql .= "VALUES (
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

            // prepara o SQL para ser inserido no BD limpando códigos maliciosos
            $stmt = $pdo->prepare($sql);

            //Passa os dados das variaveis para o INSERT do sql
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
            //Demais campos...

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
