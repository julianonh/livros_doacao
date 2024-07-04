<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM livros WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header('Location: meus_livros.php');
    } else {
        echo "Erro ao excluir livro: " . $conn->error;
    }
}
?>
