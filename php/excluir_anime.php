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
$sql_select = "SELECT imagem FROM animes WHERE id = $id";
$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $imagem = $row['imagem'];

    // Verifica se o arquivo de imagem existe e o exclui
    if (file_exists("../images/$imagem")) {
        unlink("../images/$imagem");
    }

    // Consulta SQL para excluir o anime pelo ID
    $sql_delete = "DELETE FROM animes WHERE id = $id";
    $conn->query($sql_delete);
}

// Fecha a conexão
$conn->close();

// Redireciona de volta para a página de gerenciamento
header('Location: ../html/gerenciar.html');
exit();
?>
