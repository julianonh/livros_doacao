<?php
session_start();
include 'db.php';

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

$usuarioEmail = $_SESSION['usuario'];

$sql = "SELECT id FROM usuarios WHERE email='$usuarioEmail'";
$result = $conn->query($sql);
$usuario = $result->fetch_assoc();
$usuarioId = $usuario['id'];

$sql = "SELECT * FROM livros WHERE usuario_id='$usuarioId'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Meus Livros Cadastrados</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Meus Livros Cadastrados</h1>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='livro'>";
                echo "Nome do Livro: " . $row['nome_livro'] . "<br>";
                echo "<img src='" . $row['imagem_livro'] . "' width='100' height='150'><br>";
                echo "<form method='post' action='excluir_livro.php'>";
                echo "<input type='hidden' name='livro_id' value='" . $row['id'] . "'>";
                echo "<button type='submit'>Excluir</button>";
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "Nenhum livro cadastrado.";
        }
        ?>
        <button onclick="window.location.href='cadastro_livro.php'">Voltar</button>
    </div>
</body>
</html>
