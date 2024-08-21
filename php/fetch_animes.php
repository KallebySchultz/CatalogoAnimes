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

// Obtém o parâmetro de categoria da URL (por padrão, 'assistidos')
$category = isset($_GET['category']) ? $conn->real_escape_string($_GET['category']) : 'assistidos';

// Determina a consulta SQL com base na categoria fornecida
if ($category == 'high-rating') {
    $sql = "SELECT titulo, imagem, descricao, avaliacao, resenha FROM animes ORDER BY avaliacao DESC LIMIT 10";
} else {
    $sql = "SELECT titulo, imagem, descricao, avaliacao, resenha FROM animes WHERE categoria = '$category' ORDER BY data_cadastro DESC";
}

$result = $conn->query($sql);

$animes = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        

        // Remove as casas decimais se a avaliação for um número inteiro
        if (is_numeric($row['avaliacao'])) {
            $row['avaliacao'] = (float)$row['avaliacao'];
            if (intval($row['avaliacao']) == $row['avaliacao']) {
                $row['avaliacao'] = intval($row['avaliacao']);
            }
        }
        $animes[] = $row;
    }
}

// Fecha a conexão
$conn->close();

// Retorna os dados em formato JSON
header('Content-Type: application/json');
echo json_encode($animes);
?>
