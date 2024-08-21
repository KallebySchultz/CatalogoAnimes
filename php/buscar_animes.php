<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "catalogo_animes";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi estabelecida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consulta SQL para buscar todos os animes com todos os campos necessários
$sql = "SELECT id, titulo, imagem, categoria, descricao, avaliacao, resenha FROM animes";
$result = $conn->query($sql);

$animes = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $animes[] = $row;
    }
}

// Fecha a conexão
$conn->close();

// Retorna os dados em formato JSON
header('Content-Type: application/json');
echo json_encode($animes);
?>
