<?php
session_start();

// Verifica se o usuário está logado e retorna o ID do usuário, caso contrário retorna null
$response = ['userId' => isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null];

header('Content-Type: application/json');
echo json_encode($response);
?>
