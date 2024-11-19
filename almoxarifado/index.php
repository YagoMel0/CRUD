<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almoxarifado - Produtos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Bem-vindo ao Almoxarifado</h1>
        <button onclick="window.location.href='index.php'">Listar Produtos</button>
        <button onclick="window.location.href='create.php'">Criar Produto</button>

        <?php
        include 'db.php';

        $sql = "SELECT * FROM produtos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Nome</th><th>Quantidade</th><th>Data de Entrada</th><th>Ações</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nome"]. "</td><td>" . $row["quantidade"]. "</td><td>" . $row["data_entrada"]. "</td><td>
                <a href='update.php?id=".$row["id"]."'>Atualizar</a> | 
                <a href='delete.php?id=".$row["id"]."'>Deletar</a></td></tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum produto encontrado.";
        }
        $conn->close();
        ?>

        <button class="back-button" onclick="window.location.href='index.php'">Concluir</button>
    </div>
</body>
</html>
