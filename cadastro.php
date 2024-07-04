<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO usuarios (nome, email, telefone, senha) VALUES ('$nome', '$email', '$telefone', '$senha')";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Cadastro de Usuário</h1>
        <form method="post" action="cadastro.php">
            <input type="text" name="nome" placeholder="Nome" required><br><br>
            <input type="email" name="email" placeholder="Email" required><br><br>
            <input type="text" name="telefone" placeholder="Telefone com DDD" required><br><br>
            <input type="password" name="senha" placeholder="Senha" required><br><br>
            <button type="submit">Registrar</button>
            <button type="button" onclick="window.location.href='index.php'">Voltar</button>
        </form>
    </div>
</body>
</html>
