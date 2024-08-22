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

// Obtém os dados do formulário
$user = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];

// Verifica se o nome de usuário já existe
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<script>alert('Nome de usuário já existe.'); window.location.href = '../html/register.html';</script>";
    exit();
}

// Hash da senha
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

// Insere o novo usuário no banco de dados
$sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $user, $email, $hashed_password);

if ($stmt->execute()) {
    echo "<script>alert('Usuário registrado com sucesso!'); window.location.href = '../html/login.html';</script>";
} else {
    echo "<script>alert('Erro ao registrar usuário.'); window.location.href = '../html/register.html';</script>";
}

// Fecha a conexão
$stmt->close();
$conn->close();
?>
