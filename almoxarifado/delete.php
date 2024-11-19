<?php
include 'db.php';

$id = intval($_GET['id']); // Certifique-se de que o ID seja um inteiro

$sql = "DELETE FROM produtos WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Produto deletado com sucesso";
    header("Location: index.php"); // Redireciona de volta para a página principal
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}
$conn->close();