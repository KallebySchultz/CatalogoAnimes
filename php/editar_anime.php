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

// Consulta para buscar os dados atuais do anime
$sql = "SELECT * FROM animes WHERE id = $id";
$result = $conn->query($sql);
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
$sql = "UPDATE animes SET 
    titulo='$titulo', 
    categoria='$categoria', 
    descricao='$descricao', 
    avaliacao=$avaliacao, 
    resenha='$resenha', 
    imagem='$imagem' 
WHERE id=$id";

// Executa a consulta
if ($conn->query($sql) === TRUE) {
    echo "Anime atualizado com sucesso.";
} else {
    echo "Erro ao atualizar o anime: " . $conn->error;
}

// Fecha a conexão
$conn->close();

// Redireciona de volta para a página de gerenciamento
header('Location: ../html/gerenciar.html');
exit();
?>
