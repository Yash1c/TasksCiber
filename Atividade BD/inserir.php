<?php
include_once('conexao.php');
$titulo = $_POST['titulo'];
$duracao = $_POST['duracao'];
$compositor = $_POST['compositor'];
$album = $_POST['album'];

// Inserir dados na tabela
$sql = "INSERT INTO musicas (titulo, duracao, compositor, id_album) VALUES ('$titulo', $duracao, '$compositor', '$album')";

try {
    $conn->query($sql);
} catch (mysqli_sql_exception $e) {
    echo "Erro na inserção: " . $e->getMessage();
}

header('Location: index.html');