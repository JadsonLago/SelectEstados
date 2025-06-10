<?php
header('Content-Type: application/json');

// Verifica se o ID do estado foi enviado
if (!isset($_GET['estado_id'])) {
    echo json_encode([]);
    exit;
}

$estadoId = $_GET['estado_id'];

// Conexão com o banco de dados (mesma configuração do get_estados.php)
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

// Consulta para obter as cidades do estado selecionado
$query = "SELECT id, nome FROM cidades WHERE id_estado = :estado_id ORDER BY nome";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':estado_id', $estadoId, PDO::PARAM_INT);
$stmt->execute();
$cidades = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($cidades);
?>