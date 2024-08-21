<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "catalogo_animes";
$sql_file = 'database/nome_do_arquivo.sql'; // Substitua 'nome_do_arquivo.sql' pelo nome do seu arquivo SQL

// Cria a conexão com o MySQL
$conn = new mysqli($servername, $username, $password);

// Verifica se a conexão foi estabelecida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Cria o banco de dados se não existir
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Banco de dados criado com sucesso<br>";
} else {
    echo "Erro ao criar banco de dados: " . $conn->error . "<br>";
}

// Seleciona o banco de dados
$conn->select_db($dbname);

// Lê o arquivo SQL
$sql = file_get_contents($sql_file);

// Executa o script SQL
if ($conn->multi_query($sql)) {
    do {
        // Armazena o resultado da consulta
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->more_results() && $conn->next_result());
    echo "Banco de dados importado com sucesso<br>";
} else {
    echo "Erro ao importar banco de dados: " . $conn->error . "<br>";
}

// Fecha a conexão
$conn->close();
?>
