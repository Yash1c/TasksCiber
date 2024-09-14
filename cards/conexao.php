<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_card";

// Conecta ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se há erros na conexão
if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
} else {
    echo "Conexão com o banco de dados realizada com sucesso!";
}

// Opcional: Teste de consulta para verificar se os dados estão disponíveis
$sql = "SELECT * FROM redes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Título: " . $row["titulo"] . " - Descrição: " . $row["descricao"] . "<br>";
    }
} else {
    echo "Nenhum dado encontrado na tabela videos.";
}

$conn->close();
?>
