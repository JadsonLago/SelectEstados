<?php
header('Content-Type: application/json');

// Conexão com o banco de dados
$host = 'localhost';
$dbname = 'estados_br';
$username = 'root';
$password = 'root';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

// Consulta para obter os estados
$query = "SELECT id, uf, nome FROM estados ORDER BY nome";
$stmt = $pdo->query($query);
$estados = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($estados);
?>