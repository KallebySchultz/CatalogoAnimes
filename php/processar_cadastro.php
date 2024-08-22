<?php
session_start(); // Inicia a sessão para acessar informações de login

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

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    die("Usuário não está logado.");
}

$userId = intval($_SESSION['user_id']);

// Obtém os dados do formulário
$titulo = isset($_POST['titulo']) ? $conn->real_escape_string($_POST['titulo']) : null;
$categoria = isset($_POST['categoria']) ? $conn->real_escape_string($_POST['categoria']) : null;
$descricao = isset($_POST['descricao']) ? $conn->real_escape_string($_POST['descricao']) : null;
$avaliacao = isset($_POST['avaliacao']) && $_POST['avaliacao'] !== '' ? floatval($_POST['avaliacao']) : null;
$resenha = isset($_POST['resenha']) ? $conn->real_escape_string($_POST['resenha']) : null;

// Verifica se os campos obrigatórios estão preenchidos
if (!$titulo || !$categoria || !$descricao) {
    die("Por favor, preencha todos os campos obrigatórios.");
}

// Verifica se foi enviado um arquivo de imagem
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = '../uploads/';
    $uploadFile = $uploadDir . basename($_FILES['imagem']['name']);
    
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

// Insere o novo anime no banco de dados
$sql = "INSERT INTO animes (titulo, categoria, descricao, avaliacao, resenha, imagem, user_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssdssi", $titulo, $categoria, $descricao, $avaliacao, $resenha, $imagem, $userId);

if ($stmt->execute()) {
    echo "Anime cadastrado com sucesso.";
} else {
    echo "Erro ao cadastrar o anime: " . $stmt->error;
}

// Fecha a conexão
$stmt->close();
$conn->close();

// Redireciona de volta para a página de gerenciamento
header('Location: ../html/gerenciar.html');
exit();
?>
