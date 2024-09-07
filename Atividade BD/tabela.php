<?php
include_once('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $duracao = $_POST['duracao'];
    $compositor = $_POST['compositor'];
    $album = $_POST['album'];

    $sql = "INSERT INTO musicas (titulo, duracao, compositor, id_album) VALUES ('$titulo', $duracao, '$compositor', '$album')";

    try {
        $conn->query($sql);
    } catch (mysqli_sql_exception $e) {
        echo "Erro na inserção: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Músicas</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet'href='css.css'>
    <script src='main.js'></script>

</head>
<body>
<div class="form-container">
    <h3>Adicionar Música</h3>
    <form action="tabela.php" method="POST">
        <label >Título:</label>
        <input type="text" name="titulo" required>
        <label >Duração:</label>
        <input type="number" step="0.01" name="duracao" required>
        <label >Compositor:</label>
        <input type="text" name="compositor" required>
        <label >Álbum:</label>
        <input type="text" name="album" required>
        <input type="submit" value="Adicionar">
    </form>
    <a href="lista.php"><button type="button" class="barbaridade">Listar músicas</button></a>
</div>
</body>
</html>
