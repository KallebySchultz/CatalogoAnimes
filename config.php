<?php
$servername = "localhost";
$username = "root"; // Atualize se necessário
$password = ""; // Atualize se necessário
$dbname = "catalogo_animes";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
