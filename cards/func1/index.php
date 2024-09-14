<?php
// /api/func1/index.php
require_once '../db.php';

$conn = getDbConnection();

$sql = "SELECT * FROM videos";
$stmt = $conn->prepare($sql);
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
