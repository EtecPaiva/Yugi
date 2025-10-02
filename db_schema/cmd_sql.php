<?php
require_once __DIR__ .'/../data/db_config.php';

$deleteDB = 'DROP DATABASE IF EXISTS '.banco.';';
$criarDB = 'CREATE DATABASE IF NOT EXISTS '.banco.';';
$usarDB = 'USE '.banco.';';


USE banco;

$crearTabela = "
CREATE TABLE cliente (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    telefone BIGINT,
    endereco VARCHAR(255)
)";

$crearTabela = "
CREATE TABLE p_fisica (
    cliente INT UNSIGNED,
    nome VARCHAR(255) NOT NULL,
    cpf BIGINT UNIQUE NOT NULL,
    data_nasc DATE,
    sexo ENUM('Masculino','Feminino','Outros'),
    PRIMARY KEY (cliente),
    CONSTRAINT fk_pf_cliente FOREIGN KEY (cliente) REFERENCES cliente(id) ON DELETE CASCADE
)";

$crearTabela = "
CREATE TABLE p_juridica (
    cliente INT UNSIGNED,
    razao_social VARCHAR(255) NOT NULL,
    nome_fantasia VARCHAR(255),
    cnpj BIGINT UNIQUE NOT NULL,
    fundacao DATE,
    PRIMARY KEY (cliente),
    CONSTRAINT fk_pj_cliente FOREIGN KEY (cliente) REFERENCES cliente(id) ON DELETE CASCADE
)";

$crearTabela = "
CREATE TABLE conta (
    numero INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    tipo_conta ENUM('CC','CP') NOT NULL,
    saldo FLOAT DEFAULT 0,
    cliente INT UNSIGNED NOT NULL,
    CONSTRAINT fk_conta_cliente FOREIGN KEY (cliente) REFERENCES cliente(id) ON DELETE CASCADE
)";

$crearTabela = "
CREATE TABLE transacoes (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    tipo ENUM('Saque','Deposito','Transferencia') NOT NULL,
    valor FLOAT NOT NULL,
    data DATETIME DEFAULT CURRENT_TIMESTAMP,
    descricao VARCHAR(255),
    conta_num INT UNSIGNED NOT NULL,
    CONSTRAINT fk_trans_conta FOREIGN KEY (conta_num) REFERENCES conta(numero) ON DELETE CASCADE
)";



try {
    // Conexão inicial sem banco de dados
    $pdo = new PDO(
        dsn: 'mysql:host='.DB_HOST, 
        username: DB_USER, 
        password: DB_PASS
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Deletar banco de dados se existir
    $pdo->exec(statement: $deleteDB);

    // Criar banco de dados
    $pdo->exec(statement: $criarDB);
    // Selecionar banco de dados
    $pdo->exec(statement: $usarDB);

    // Criar tabela
    $pdo->exec($crearTabela);

    // Inserir dados   
    $pdo->exec(statement: $insertDados);

    echo "Banco de dados, tabela e dados criados com sucesso!";
} catch (PDOException $e) {
    die("Erro: " . $e->getMessage());
}
