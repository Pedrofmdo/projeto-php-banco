<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "product_db";  // Nome do banco de dados

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Variável para a mensagem de sucesso
$successMessage = '';

// Verifica se o formulário foi submetido via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    
    // Insere os dados na tabela 'products'
    $sql = "INSERT INTO products (name, price, stock)
            VALUES ('$name', '$price', '$stock')";

    if ($conn->query($sql) === TRUE) {
        // Exibe a mensagem de sucesso
        $successMessage = "Produto cadastrado com sucesso!";
    } else {
        // Exibe uma mensagem de erro se a inserção falhar
        $successMessage = "Erro: " . $sql . "<br>" . $conn->error;
    }
}

// Fecha a conexão
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
</head>
<body>
    <h2>Cadastro de Produto</h2>

    <!-- Exibe a mensagem de sucesso ou erro -->
    <?php
    if ($successMessage) {
        echo "<p>$successMessage</p>";
    }
    ?>

    <!-- Formulário para cadastrar um produto -->
    <form method="post" action="">
        <label for="name">Nome do Produto:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="price">Preço:</label><br>
        <input type="number" step="0.01" id="price" name="price" required><br><br>

        <label for="stock">Quantidade em Estoque:</label><br>
        <input type="number" id="stock" name="stock" required><br><br>

        <input type="submit" value="Cadastrar Produto">
    </form>
</body>
</html>
