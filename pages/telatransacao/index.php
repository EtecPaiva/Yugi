<?php
require_once "../../data/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $pdo->prepare("CALL sp_transferir(?,?,?,?)");
    $stmt->execute([$_POST["tipo"], $_POST["valor"], $_POST["descricao"], $_POST["conta"]]);
    $msg = "Transação realizada!";
}
?>
<link rel="stylesheet" href="estilo.css">
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Transações</title>
</head>
<body>
    <h1>Transações</h1>

    <?php if (!empty($msg)) echo "<p><b>$msg</b></p>"; ?>

    <form method="post">
        Conta Nº: <input type="number" name="conta" required><br>
        Tipo: 
        <select name="tipo">
            <option>Deposito</option>
            <option>Saque</option>
            <option>Transferencia</option>
        </select><br>
        Valor: <input type="number" step="0.01" name="valor" required><br>
        Descrição: <input type="text" name="descricao"><br>
        <button type="submit">Executar</button>
    </form>

    <br>
    <a href="../../index.php">⬅ Voltar ao Menu</a>
</body>
</html>
