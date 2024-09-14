<?php
// /api/func2/index.php

require_once '../db.php';

// Obtém o parâmetro 'id' da URL
$param1 = isset($_GET['id']) ? $_GET['id'] : '';

if (empty($param1)) {
    http_response_code(400);
    echo json_encode(["message" => "O parâmetro id é obrigatório"]);
    exit;
}

$conn = getDbConnection();

$sql = "SELECT * FROM videos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $param1); // 'i' indica que o parâmetro é um inteiro
$stmt->execute();
$result = $stmt->get_result();

$rows = [];
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}

http_response_code(200);
header('Content-Type: application/json');
echo json_encode($rows);

$conn->close();
?>
