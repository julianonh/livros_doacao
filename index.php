<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email='$login' AND senha='$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['usuario'] = $login;
        header('Location: cadastro_livro.php');
    } else {
        echo "<div class='error'>Login ou senha inválidos!</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doe Livros</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Seja bem-vindo ao site Doe Livros</h1>
        <div class="text-container">
            <p>O site tem o intuito de cadastrar livros para serem doados.</p>
            <p>A doação de livros que não estão mais sendo utilizados é muito importante, pois esses livros podem ser extremamente úteis para outras pessoas. Ao doar um livro, você contribui para a disseminação do conhecimento e para a formação de uma sociedade mais educada e informada.</p>
            <p>Cadastre-se, entre no site e veja todos os livros que já estão para doação podendo entrar em contato diretamente com a pessoa que esta doando.</p>
        </div>
        <form method="post" action="index.php">
            <input type="text" name="login" placeholder="Login" required><br><br>
            <input type="password" name="senha" placeholder="Senha" required><br><br>
            <button type="submit">Entrar</button>
            <button type="button" onclick="window.location.href='cadastro.php'">Cadastrar</button>
        </form>
    </div>
</body>
</html>
