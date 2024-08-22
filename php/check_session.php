<?php
session_start();

// Verifica se a sessão do usuário está ativa
if (!isset($_SESSION['user_id'])) {
    // Se não estiver logado, redireciona para a página de login
    header('Location: ../login.html');
    exit();
}
?>
