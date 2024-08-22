<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "catalogo_animes";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$user = $_POST['username'];
$pass = $_POST['password'];

// Prepara a consulta para verificar o usuário
$sql = "SELECT * FROM users WHERE username = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $user, $pass);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
    $_SESSION['loggedIn'] = true;
    $_SESSION['user_id'] = $userData['id']; // Mudança aqui para 'user_id'
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Usuário ou senha incorretos']);
}

$stmt->close();
$conn->close();
?>
