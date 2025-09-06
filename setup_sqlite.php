<?php
// Simple SQLite setup for testing
$db = new PDO('sqlite:test_database.db');

// Create users table
$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT UNIQUE,
    email TEXT,
    password TEXT
)");

// Create animes table  
$db->exec("CREATE TABLE IF NOT EXISTS animes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    titulo TEXT,
    imagem TEXT,
    categoria TEXT,
    descricao TEXT,
    avaliacao REAL,
    resenha TEXT,
    data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP,
    user_id INTEGER
)");

// Insert test user
$db->exec("INSERT OR IGNORE INTO users (username, email, password) VALUES ('testuser', 'test@test.com', 'testpass')");

// Insert some test animes
$testAnimes = [
    ['Toradora!', '../uploads/toradora.png', 'assistidos', 'Comédia Romântica e Slice of Life - Ryuji é mal interpretado por causa de seu olhar ameaçador...', 8.8, 'Um dos melhores animes do gênero...', 1],
    ['Solo Leveling', '../uploads/solo.png', 'esperando', 'Ação e Fantasia - Há mais de uma década, surgiu um portal...', 8.5, 'Pegada de protagonista muito fraco...', 1],
    ['Classroom of the Elite', '../uploads/class.jpg', 'esperando', 'Comédia, Drama e Suspense Psicológico...', 9.3, 'Com certeza um dos meus animes favoritos...', 1],
    ['Mashle Muscle', '../uploads/mash.png', 'esperando', 'Ação, Aventura e Fantasia - Em um mundo onde todos usam magia...', 8.6, 'Definitivamente um anime muito bom...', 1]
];

$stmt = $db->prepare("INSERT OR IGNORE INTO animes (titulo, imagem, categoria, descricao, avaliacao, resenha, user_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
foreach ($testAnimes as $anime) {
    $stmt->execute($anime);
}

echo "SQLite database setup complete!";
?>