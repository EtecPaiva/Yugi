<?php
require_once "../../data/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $pdo->prepare("UPDATE cliente SET telefone=?, endereco=? WHERE id=?");
    $stmt->execute([$_POST["telefone"], $_POST["endereco"], $_POST["id"]]);
    $msg = "Cliente atualizado!";
}
?>
<link rel="stylesheet" href="estilo.css">
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
</head>
<body>
    <h1>Editar Cliente</h1>

    <?php if (!empty($msg)) echo "<p><b>$msg</b></p>"; ?>

    <form method="post">
        ID Cliente: <input type="number" name="id" required><br>
        Novo Telefone: <input type="text" name="telefone"><br>
        Novo Endereço: <input type="text" name="endereco"><br>
        <button type="submit">Atualizar</button>
    </form>

    <br>
    <a href="../../index.php">⬅ Voltar ao Menu</a>
</body>
</html>
