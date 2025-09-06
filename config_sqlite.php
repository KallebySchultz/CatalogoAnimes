<?php
// SQLite configuration for testing
try {
    $conn = new PDO('sqlite:test_database.db');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>