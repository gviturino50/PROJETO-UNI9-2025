<?php
require_once 'conecta.php';
session_start();

$id_user = $_SESSION['user_id'];

try {
    $query = "SELECT id_item, nome, descricao, quantidade, quantidade_min, data_criacao
              FROM estoque
              WHERE id_user = ?
              ORDER BY data_criacao DESC";

    $stmt = $pdo->prepare($query);
    $stmt->execute([$id_user]);

    $itens = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retorna JSON
    header("Content-Type: application/json");
    echo json_encode($itens);

} catch (PDOException $e) {
    // Retorna erro em JSON
    header("Content-Type: application/json", true, 500);
    echo json_encode(['error' => $e->getMessage()]);
}
