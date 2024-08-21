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

// Variável para verificar se o cadastro foi bem-sucedido
$success = false;

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $categoria = $_POST["categoria"];
    $descricao = $_POST["descricao"];
    $avaliacao = $_POST["avaliacao"];
    $resenha = $_POST["resenha"];

    // Verifica se a imagem foi enviada e trata o upload
    if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] == 0) {
        // Define o nome da imagem com base no título do anime
        $imagem_nome = $titulo . '.' . pathinfo($_FILES["imagem"]["name"], PATHINFO_EXTENSION);
        $target_dir = "../uploads/";
        $target_file = $target_dir . $imagem_nome;

        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
            $imagem = $target_file; // Caminho da imagem
        } else {
            $imagem = null; // Define como nulo se o upload falhar
        }
    } else {
        $imagem = null; // Define como nulo se a imagem não for fornecida
    }

    // Prepara a consulta SQL
    $stmt = $conn->prepare("INSERT INTO animes (titulo, imagem, categoria, descricao, avaliacao, resenha) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $titulo, $imagem, $categoria, $descricao, $avaliacao, $resenha);

    // Executa a consulta
    if ($stmt->execute()) {
        $success = true; // Define sucesso se a consulta for bem-sucedida
    }

    // Fecha a declaração
    $stmt->close();
}

// Fecha a conexão
$conn->close();

// Redireciona para a página anterior
if ($success) {
    header("Location: ../html/gerenciar.html");
    exit();
} else {
    // Redireciona para a página anterior com um parâmetro de erro
    header("Location: ../html/gerenciar.html?error=1");
    exit();
}
?>
