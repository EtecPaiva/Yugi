<?php
require_once __DIR__ .'/../data/db_config.php';

$deleteDB = 'DROP DATABASE IF EXISTS '.DB_Prova.';';
$criarDB = 'CREATE DATABASE IF NOT EXISTS '.DB_Prova.';';
$usarDB = 'USE '.DB_Prova.';';


$insertDados = "
  INSERT INTO Jogos (titulo, descricao, lancamento, tipo, `plataforma`) VALUES
   
";

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
