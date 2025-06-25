CREATE DATABASE IF NOT EXISTS projeto_boa
  CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE projeto_boa;

-- Tabela de Usuários
CREATE TABLE IF NOT EXISTS usuarios (
  id_usuario BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

  nome VARCHAR(255) NOT NULL,
  cpf VARCHAR(14),
  data_nascimento DATE,
  celular VARCHAR(20),
  rua VARCHAR(255),
  numero VARCHAR(10),
  complemento VARCHAR(50),
  bairro VARCHAR(100),
  cidade VARCHAR(100),
  estado CHAR(2),
  cep VARCHAR(10),
  email VARCHAR(255) NOT NULL UNIQUE,
  senha VARCHAR(255) NOT NULL,
  tipo ENUM('Administrador', 'Funcionário', 'Cliente') NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  deleted_at TIMESTAMP NULL DEFAULT NULL
);

-- Tabela de Produtos/Serviços
CREATE TABLE IF NOT EXISTS produtos (
  id_produto BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

  nome VARCHAR(255) NOT NULL,
  tipo ENUM('Café da Manhã', 'Almoço', 'Janta', 'Bebida', 'Sobremesa', 'Salgados') NOT NULL,
  preco DECIMAL(10,2) NOT NULL,
  estoque INT NOT NULL DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  deleted_at TIMESTAMP NULL DEFAULT NULL
);

-- Tabela de Vendas
CREATE TABLE IF NOT EXISTS vendas (
  id_venda BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  usuario_id BIGINT UNSIGNED NOT NULL,
  produto_id BIGINT UNSIGNED NOT NULL,

  quantidade INT NOT NULL,
  data_venda DATE NOT NULL,
  forma_pagamento ENUM('Pix', 'Dinheiro', 'Débito', 'Crédito') NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  deleted_at TIMESTAMP NULL DEFAULT NULL,

-- Chaves estrangeiras
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario),
  FOREIGN KEY (produto_id) REFERENCES produtos(id_produto)

);
