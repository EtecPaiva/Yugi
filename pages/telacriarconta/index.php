<?php
require_once "../../data/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST["tipo"] === "pf") {
        $stmt = $pdo->prepare("CALL sp_criar_cliente_fisico(?,?,?,?,?,?,?,?)");
        $stmt->execute([
            $_POST["usuario"],
            $_POST["senha"],
            $_POST["telefone"],
            $_POST["endereco"],
            $_POST["nome"],
            $_POST["cpf"],
            $_POST["data_nasc"],
            $_POST["sexo"]
        ]);
        $msg = "Cliente Pessoa Física criado!";
    } else {
        $stmt = $pdo->prepare("CALL sp_criar_cliente_juridico(?,?,?,?,?,?,?,?)");
        $stmt->execute([
            $_POST["usuario"],
            $_POST["senha"],
            $_POST["telefone"],
            $_POST["endereco"],
            $_POST["razao_social"],
            $_POST["nome_fantasia"],
            $_POST["fundacao"],
            $_POST["cnpj"]
        ]);
        $msg = "Cliente Pessoa Jurídica criado!";
    }
}
?>
<link rel="stylesheet" href="estilo.css">
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Conta</title>
</head>
<body>
    <h1>Criar Conta</h1>

    <?php if (!empty($msg)) echo "<p><b>$msg</b></p>"; ?>

    <form method="post">
        <label>Tipo de Cliente:</label>
        <select name="tipo">
            <option value="pf">Pessoa Física</option>
            <option value="pj">Pessoa Jurídica</option>
        </select><br><br>

        Usuário: <input type="text" name="usuario" required><br>
        Senha: <input type="password" name="senha" required><br>
        Telefone: <input type="text" name="telefone"><br>
        Endereço: <input type="text" name="endereco"><br><br>

        <h3>Pessoa Física</h3>
        Nome: <input type="text" name="nome"><br>
        CPF: <input type="text" name="cpf"><br>
        Data Nasc: <input type="date" name="data_nasc"><br>
        Sexo: <select name="sexo">
            <option>Masculino</option>
            <option>Feminino</option>
            <option>Outros</option>
        </select><br><br>

        <h3>Pessoa Jurídica</h3>
        Razão Social: <input type="text" name="razao_social"><br>
        Nome Fantasia: <input type="text" name="nome_fantasia"><br>
        Fundação: <input type="date" name="fundacao"><br>
        CNPJ: <input type="text" name="cnpj"><br><br>

        <button type="submit">Criar</button>
    </form>

    <br>
    <a href="../../index.php">⬅ Voltar ao Menu</a>
</body>
</html>
