<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sales_db";  // Nome do banco de dados

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
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    
    // Insere os dados na tabela 'sales'
    $sql = "INSERT INTO sales (product_id, quantity)
            VALUES ('$product_id', '$quantity')";

    if ($conn->query($sql) === TRUE) {
        // Exibe a mensagem de sucesso
        $successMessage = "Venda registrada com sucesso!";
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
    <title>Cadastro de Venda</title>
</head>
<body>
    <h2>Cadastro de Venda</h2>

    <!-- Exibe a mensagem de sucesso ou erro -->
    <?php
    if ($successMessage) {
        echo "<p>$successMessage</p>";
    }
    ?>

    <!-- Formulário para cadastrar uma venda -->
    <form method="post" action="">
        <label for="product_id">ID do Produto:</label><br>
        <input type="number" id="product_id" name="product_id" required><br><br>

        <label for="quantity">Quantidade:</label><br>
        <input type="number" id="quantity" name="quantity" required><br><br>

        <input type="submit" value="Cadastrar Venda">
    </form>
</body>
</html>
