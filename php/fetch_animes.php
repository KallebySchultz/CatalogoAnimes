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

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Usuário não está logado.']);
    exit();
}

$user_id = intval($_SESSION['user_id']); // Obtém o ID do usuário logado da sessão

// Obtém o parâmetro de categoria da URL
$category = isset($_GET['category']) ? $conn->real_escape_string($_GET['category']) : 'assistidos';

// Determina a consulta SQL com base na categoria fornecida
if ($category == 'high-rating') {
    $sql = "SELECT titulo, imagem, descricao, avaliacao, resenha FROM animes WHERE user_id = ? ORDER BY avaliacao DESC LIMIT 10";
} else {
    $sql = "SELECT titulo, imagem, descricao, avaliacao, resenha FROM animes WHERE categoria = ? AND user_id = ? ORDER BY data_cadastro DESC";
}

$stmt = $conn->prepare($sql);

if ($category == 'high-rating') {
    $stmt->bind_param("i", $user_id);
} else {
    $stmt->bind_param("si", $category, $user_id);
}

$stmt->execute();
$result = $stmt->get_result();

$animes = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Remove as casas decimais se a avaliação for um número inteiro
        if (is_numeric($row['avaliacao'])) {
            $row['avaliacao'] = (float)$row['avaliacao'];
            if (intval($row['avaliacao']) == $row['avaliacao']) {
                $row['avaliacao'] = intval($row['avaliacao']);
            }
        }

        // Ajusta o caminho da imagem para garantir que seja relativo ao diretório correto
        if (!str_starts_with($row['imagem'], '../uploads/')) {
            $row['imagem'] = '../uploads/' . $row['imagem'];
        }

        $animes[] = $row;
    }
}

// Fecha a conexão
$stmt->close();
$conn->close();

// Retorna os dados em formato JSON
header('Content-Type: application/json');
echo json_encode($animes);
?>
