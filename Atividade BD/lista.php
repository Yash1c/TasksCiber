<?php
include_once('conexao.php');

echo "<link rel='stylesheet'href='css.css'>";
echo "<style>
body{
flex-direction: column;
color : #FFFFFF;
font-weight: 700;
}
</style>
";

$sql = "SELECT * FROM musicas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Name: " . $row["titulo"] . " - Compositor: " . $row["compositor"] . " - Álbum: " . $row['id_album'] . "<br>";
    }
} else {
    echo "0 results";
}

echo "<a href='index.html'><button class='barbaridade'>Voltar</button></a>";

