<?php
include 'db.php';

$sql = "SELECT l.nome_livro, l.imagem_livro, u.telefone FROM livros l INNER JOIN usuarios u ON l.usuario_id = u.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Todos os Livros Cadastrados</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Todos os Livros Cadastrados para Doação</h1>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='livro'>";
                echo "Nome do Livro: " . $row['nome_livro'] . "<br>";
                echo "<img src='" . $row['imagem_livro'] . "' width='100' height='150'><br>";
                echo "Telefone: " . $row['telefone'] . "<br>";
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
