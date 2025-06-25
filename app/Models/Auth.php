<?php
// Model responsável pela autenticação de usuários (login)

// Informa em qual área da memória vai ficar alocado
namespace App\Models;

// Importa o Arquivo de BD para ser utilizado nesta classe
use App\Core\Database;

// Importa a classe de BD do PHP
use PDO;
use PDOException;

class Auth
{
    // Função estática para realizar o login do usuário
    public static function login($usuario, $senha)
    {
        // Inicia a conexão com o banco de dados
        $pdo = Database::conectar();

        // Query SQL para buscar o usuário pelo email
        $sql = "SELECT * FROM usuarios WHERE deleted_at IS NULL AND email = :email LIMIT 1";

        // Prepara a query para execução
        $stmt = $pdo->prepare($sql);

        // Vincula o parâmetro email à query
        $stmt->bindParam(":email", $usuario, PDO::PARAM_STR);

        // Executa a query
        $stmt->execute();

        // Busca o resultado da query
        $usuario = $stmt->fetch();

        // Verifica se o usuário existe e se a senha está correta
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            // Verifica se a sessão já está iniciada
            if (session_status() === PHP_SESSION_NONE) {
                // Inicia a sessão se ainda não estiver iniciada    
                session_start();
            }
            // Armazena os dados do usuário na sessão
            $_SESSION['usuario_id'] = $usuario['id_usuario'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            $_SESSION['usuario_email'] = $usuario['email'];
            $_SESSION['usuario_tipo'] = $usuario['tipo'];
            return true; // Login bem-sucedido
        }
        return false; // Login falhou
    }
}
