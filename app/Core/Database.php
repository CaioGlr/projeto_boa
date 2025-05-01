<?php

namespace App\Core;

//Importa a classe do PDO (Gestão de BD em PHP) 
use PDO;
//Importa a classe do PDO para tratamento de erros
use PDOException;

class Database{
    public static function conectar() {
        $host = 'localhost'; // Endereço do servidor BD
        $porta = '3306'; // Porta do servidor BD
        $banco = 'projeto_boa'; // Nome do banco de dados
        $usuario = 'root'; // Usuário padrão XAMPP
        $senha = ''; // Senha padrão XAMPP (vazia)

        //Cria a string de conexão com o banco de dados
        $dsn = "mysql:host=$host;port=$porta;dbname=$banco;charset=utf8mb4";
        // Tenta executar um determinado código
        try{
            return new PDO($dsn, $usuario, $senha, [
                //Ativa o modo erro do PDO
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                //Define o modo de busca padrão como associativo
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        }catch(PDOException $e){
            //Caso ocorra um erro, exibe uma mensagem de erro
            die("Erro ao conectar ao banco de dados: " . $e->getMessage());

        }

    }
}