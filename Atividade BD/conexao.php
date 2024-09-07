<?php
try {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "web";
    $conn = new mysqli($servername, $username, $password, $dbname);
    //echo "jóia👍";
} catch ( mysqli_sql_exception $e ){
    echo "Erro de conexão:" . $e->getMessage();
}