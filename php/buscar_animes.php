<?php
session_start(); // Inicia a sessão para acessar informações de login

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

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    die("Usuário não está logado.");
}

$userId = intval($_SESSION['user_id']);

// Consulta SQL para buscar todos os animes do usuário logado
$sql = "SELECT id, titulo, imagem, categoria, descricao, avaliacao, resenha FROM animes WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

$animes = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $animes[] = $row;
    }
}

// Fecha a conexão
$stmt->close();
$conn->close();

// Retorna os dados em formato JSON
header('Content-Type: application/json');
echo json_encode($animes);
?>
