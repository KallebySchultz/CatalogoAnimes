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

// Obtém os dados do formulário
$titulo = isset($_POST['titulo']) ? $conn->real_escape_string($_POST['titulo']) : null;
$categoria = isset($_POST['categoria']) ? $conn->real_escape_string($_POST['categoria']) : null;
$descricao = isset($_POST['descricao']) ? $conn->real_escape_string($_POST['descricao']) : null;
$avaliacao = isset($_POST['avaliacao']) && $_POST['avaliacao'] !== '' ? floatval($_POST['avaliacao']) : null;
$resenha = isset($_POST['resenha']) ? $conn->real_escape_string($_POST['resenha']) : null;

// Verifica se foi enviado um novo arquivo de imagem
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = '../images/';
    $uploadFile = $uploadDir . basename($_FILES['imagem']['name']);

    // Verifica se o arquivo é uma imagem
    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowedTypes)) {
        echo "Formato de imagem não suportado.";
        exit();
    }

    // Mover o arquivo para a pasta de uploads
    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadFile)) {
        $imagem = basename($_FILES['imagem']['name']);
    } else {
        echo "Erro ao carregar a imagem.";
        exit();
    }
} else {
    $imagem = null;
}

// Consulta para buscar os dados atuais do anime
$stmt = $conn->prepare("SELECT * FROM animes WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $anime = $result->fetch_assoc();

    // Use os valores antigos se os novos não foram fornecidos
    $titulo = $titulo ?? $anime['titulo'];
    $categoria = $categoria ?? $anime['categoria'];
    $descricao = $descricao ?? $anime['descricao'];
    $avaliacao = $avaliacao !== null ? $avaliacao : $anime['avaliacao'];
    $resenha = $resenha ?? $anime['resenha'];
    $imagem = $imagem ?? $anime['imagem'];
} else {
    echo "Anime não encontrado.";
    exit();
}

// Atualiza o banco de dados com os dados fornecidos
$stmt = $conn->prepare("UPDATE animes SET titulo=?, categoria=?, descricao=?, avaliacao=?, resenha=?, imagem=? WHERE id=?");
$stmt->bind_param("sssdssi", $titulo, $categoria, $descricao, $avaliacao, $resenha, $imagem, $id);

if ($stmt->execute()) {
    echo "Anime atualizado com sucesso.";
} else {
    echo "Erro ao atualizar o anime: " . $stmt->error;
}

// Fecha a conexão
$stmt->close();
$conn->close();

// Redireciona de volta para a página de gerenciamento
header('Location: ../html/gerenciar.html');
exit();
?>
