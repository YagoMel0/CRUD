<?php
include 'db.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];
    $data_entrada = $_POST['data_entrada'];

    // Verifica se todos os campos estão preenchidos
    if (!empty($id) && !empty($nome) && !empty($quantidade) && !empty($data_entrada)) {
        // Prepara a consulta SQL para atualização
        $sql = "UPDATE produtos SET nome='$nome', quantidade='$quantidade', data_entrada='$data_entrada' WHERE id='$id'";

        // Executa a consulta e verifica o resultado
        if ($conn->query($sql) === TRUE) {
            echo "Produto atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar produto: " . $conn->error;
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }

    $conn->close();
} else {
    // Se o formulário não foi enviado, obtenha os dados do produto para exibir no formulário
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM produtos WHERE id='$id'");
    $row = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Produto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Atualizar Produto</h1>
        <form method="POST" action="update.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            Nome: <input type="text" name="nome" value="<?php echo $row['nome']; ?>" required><br>
            Quantidade: <input type="number" name="quantidade" value="<?php echo $row['quantidade']; ?>" required><br>
            Data de Entrada: <input type="date" name="data_entrada" value="<?php echo $row['data_entrada']; ?>" required><br>
            <input type="submit" name="update" value="Atualizar Produto">
        </form>
        <button class="back-button" onclick="window.location.href='index.php'">Voltar</button>
    </div>
</body>
</html>
