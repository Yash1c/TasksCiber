<?php
// Configurações do banco de dados
$servidor = "localhost";  // Alterar para o seu servidor
$usuario = "root";        // Alterar para o seu usuário
$senha = "";              // Alterar para a sua senha
$banco = "db_card";       // Alterar para o nome do seu banco

// Conectar ao banco de dados
$conn = new mysqli($servidor, $usuario, $senha, $banco);

// Verificar se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Preparar a consulta SQL
$sql = "SELECT id, titulo, descricao, caminho FROM sociais";
$result = $conn->query($sql);

// Array para armazenar os dados
$data = [];

// Verificar se há resultados
if ($result->num_rows > 0) {
    // Buscar cada linha de resultado e adicionar ao array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Definir o cabeçalho como JSON
header('Content-Type: application/json');

// Enviar a resposta JSON
echo json_encode($data);

// Fechar a conexão com o banco de dados
$conn->close();
?>
