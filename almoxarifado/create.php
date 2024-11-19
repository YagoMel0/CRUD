<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];
    $data_entrada = $_POST['data_entrada'];

    // Verifica se todos os campos estão preenchidos
    if (!empty($nome) && !empty($quantidade) && !empty($data_entrada)) {
        // Prepara a consulta SQL
        $sql = "INSERT INTO produtos (nome, quantidade, data_entrada) VALUES ('$nome', '$quantidade', '$data_entrada')";

        // Executa a consulta e verifica o resultado
        if ($conn->query($sql) === TRUE) {
            echo "Novo produto adicionado com sucesso!";
        } else {
            echo "Erro ao adicionar produto: " . $conn->error;
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Produto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Criar Novo Produto</h1>
        <form method="POST" action="create.php">
            Nome: <input type="text" name="nome" required><br>
            Quantidade: <input type="number" name="quantidade" required><br>
            Data de Entrada: <input type="date" name="data_entrada" required><br>
            <input type="submit" value="Criar Produto">
        </form>
        <button class="back-button" onclick="window.location.href='index.php'">Voltar</button>
    </div>
</body>
</html>
