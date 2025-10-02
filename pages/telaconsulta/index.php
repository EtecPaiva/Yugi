<?php
require_once "../../data/connection.php";
$dados = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $pdo->prepare("SELECT * FROM cliente WHERE id=?");
    $stmt->execute([$_POST["id"]]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    $contas = $pdo->prepare("SELECT * FROM conta WHERE cliente=?");
    $contas->execute([$_POST["id"]]);
    $dados["contas"] = $contas->fetchAll(PDO::FETCH_ASSOC);
}
?>
<link rel="stylesheet" href="estilo.css">
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consulta</title>
</head>
<body>
    <h1>Consultar Cliente</h1>

    <form method="post">
        ID Cliente: <input type="number" name="id" required>
        <button type="submit">Consultar</button>
    </form>

    <?php if (!empty($dados)) { ?>
        <h3>Dados Cliente</h3>
        <pre><?php print_r($dados); ?></pre>
    <?php } ?>

    <br>
    <a href="../../index.php">⬅ Voltar ao Menu</a>
</body>
</html>
