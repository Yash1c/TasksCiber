<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_FILES) {
    $arquivo = $_FILES['arquivo']; // O arquivo enviado
    $nome_arquivo = $arquivo['name']; // Nome do arquivo
    $pasta = "imagens/"; // Pasta onde queremos armazenar o arquivo

    // Verifica se a pasta existe, caso contrário, cria
    if (!file_exists($pasta)) {
        mkdir($pasta, 0777); // Cria a pasta com permissões
    }

    // Verifica se o arquivo é uma imagem PNG
    if ($arquivo['type'] === 'image/png') {
        // Tenta mover o arquivo para a pasta
        if (move_uploaded_file($arquivo['tmp_name'], $pasta . $nome_arquivo)) {
            echo "Arquivo enviado com sucesso!";
        } else {
            echo "Erro ao mover o arquivo.";
        }
    } else {
        echo "Somente arquivos PNG são permitidos.";
    }
} else {
    echo "Nenhum arquivo foi enviado.";
}
?>
