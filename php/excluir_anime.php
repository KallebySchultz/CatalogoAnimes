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

// Obtém o ID do anime do formulário
$id = intval($_POST['animeId']);

// Consulta SQL para obter o caminho da imagem antes de excluir o registro
$stmt = $conn->prepare("SELECT imagem FROM animes WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $imagem = $row['imagem'];

    // Verifica se o arquivo de imagem existe e o exclui
    $imagePath = "../images/" . $imagem;
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Consulta SQL para excluir o anime pelo ID
    $stmt = $conn->prepare("DELETE FROM animes WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

// Fecha a conexão
$stmt->close();
$conn->close();

// Redireciona de volta para a página de gerenciamento
header('Location: ../html/gerenciar.html');
exit();
?>
