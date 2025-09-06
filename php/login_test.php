<?php
session_start();

try {
    $conn = new PDO('sqlite:../test_database.db');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$user = $_POST['username'];
$pass = $_POST['password'];

// Prepare the query to verify user
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$stmt->execute([$user, $pass]);
$userData = $stmt->fetch(PDO::FETCH_ASSOC);

if ($userData) {
    $_SESSION['loggedIn'] = true;
    $_SESSION['user_id'] = $userData['id'];
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Usuário ou senha incorretos']);
}
?>