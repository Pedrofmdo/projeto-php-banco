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

// Recupera todos os registros da tabela 'sales'
$sql = "SELECT * FROM sales";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendas Registradas</title>
</head>
<body>
    <h2>Vendas Registradas</h2>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Produto ID</th>
            <th>Quantidade</th>
            <th>Data da Venda</th>
        </tr>

        <?php
        // Exibe as vendas registradas
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["product_id"] . "</td>
                        <td>" . $row["quantity"] . "</td>
                        <td>" . $row["sale_date"] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhuma venda registrada</td></tr>";
        }
        ?>

    </table>
</body>
</html>

<?php
// Fecha a conexão
$conn->close();
?>
