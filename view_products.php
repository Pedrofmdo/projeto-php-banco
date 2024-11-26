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

// Recupera todos os registros da tabela 'products'
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos Cadastrados</title>
</head>
<body>
    <h2>Produtos Cadastrados</h2>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome do Produto</th>
            <th>Preço</th>
            <th>Estoque</th>
        </tr>

        <?php
        // Exibe os produtos cadastrados
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["price"] . "</td>
                        <td>" . $row["stock"] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum produto cadastrado</td></tr>";
        }
        ?>

    </table>
</body>
</html>

<?php
// Fecha a conexão
$conn->close();
?>
