<?php
session_start();
include 'db.php';

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeLivro = $_POST['nome_livro'];
    $imagemLivro = $_FILES['imagem_livro']['name'];
    $usuarioEmail = $_SESSION['usuario'];

    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($imagemLivro);
    move_uploaded_file($_FILES['imagem_livro']['tmp_name'], $targetFile);

    $sql = "SELECT id FROM usuarios WHERE email='$usuarioEmail'";
    $result = $conn->query($sql);
    $usuario = $result->fetch_assoc();
    $usuarioId = $usuario['id'];

    $sql = "INSERT INTO livros (nome_livro, imagem_livro, usuario_id) VALUES ('$nomeLivro', '$targetFile', '$usuarioId')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='success'>Livro cadastrado com sucesso!</div>";
    } else {
        echo "<div class='error'>Erro: " . $sql . "<br>" . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Livro</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Cadastro de Livro para Doação</h1>
        <form method="post" action="cadastro_livro.php" enctype="multipart/form-data">
            <input type="text" name="nome_livro" placeholder="Nome do Livro" required><br><br>
            <input type="file" name="imagem_livro" required><br><br>
            <button type="submit">Cadastrar Livro</button>
        </form>
        <button onclick="window.location.href='meus_livros.php'">Meus Livros Cadastrados</button>
        <button onclick="window.location.href='todos_livros.php'">Ver Todos os Livros Cadastrados</button>
        <button type="button" onclick="window.location.href='index.php'">Voltar</button>
    </div>
</body>
</html>
