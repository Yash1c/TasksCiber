<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    // Definir o diretório onde a imagem será salva
    $diretorioUpload = "images/";


    // Criar o nome do arquivo com base no timestamp (HoraMinutoSegundo)
    $nomeArquivo = date("His") . ".png"; 

    // Caminho completo para o arquivo
    $caminhoArquivo = "./" . $diretorioUpload . $nomeArquivo;

    // Verificar o tipo de arquivo
    $tipoArquivo = strtolower(pathinfo($_FILES["imagem"]["name"], PATHINFO_EXTENSION));

    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];

    $id = $conn->query("SELEct MAX(id) as id FROM sociais")->fetch_assoc()['id'] + 1;

    // Tentar fazer o upload do arquivo
    if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminhoArquivo)) {
        // Preparar a consulta para inserir no banco de dados
        $sql = "INSERT INTO sociais (id, titulo, descricao, caminho) VALUES ('$id', '$nome', '$descricao', '$caminhoArquivo')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro inserido com sucesso!<br>";
            echo "Nome: " . $nome . "<br>";
            echo "Descrição: " . $descricao . "<br>";
            echo "Imagem salva em: " . $caminhoArquivo;
        } else {
            echo "Erro ao inserir no banco de dados: " . $conn->error;
        }
    } else {
        echo "Desculpe, houve um erro ao enviar o seu arquivo.";
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
}    
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Upload</title>
</head>
<body>

    <h2>Formulário de Inserção</h2>

    <form action="index.php" method="post" enctype="multipart/form-data">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required><br><br>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" required></textarea><br><br>

        <label for="imagem">Selecione uma imagem PNG:</label>
        <input type="file" name="imagem" id="imagem" accept=".png" required><br><br>

        <input type="submit" name="submit" value="Enviar">
    </form>

</body>
</html>
