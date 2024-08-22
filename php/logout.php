<?php
session_start();
session_unset();
session_destroy();
header('Location: ../index.html'); // Redireciona para a página principal após o logout
exit();
?>
