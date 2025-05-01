<?php

// Informa em qual área da memória vai ficar alocado
namespace App\Models;

// Importa o Arquivo de BD para ser utilizado nesta classe
use App\Core\Database;

// Importa a classe de BD do PHP
use PDO;

class Usuario {

    // Busca todos os usuários
    public static function buscarTodos(){
        // Inicia a conexão com o banco de dados
        $pdo = Database::conectar();

        // Monta o Script SQL de consulta
        $sql = "SELECT * FROM usuarios WHERE delete_at IS NULL";

        // Retorna o resultado do SQL
        return $pdo->query($sql)->fetchAll();

    }

}