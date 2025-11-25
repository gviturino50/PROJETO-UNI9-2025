<?php
require_once 'conecta.php';
session_start();

$id_user = $_SESSION['user_id'];

$query = "SELECT id_item, nome, descricao, quantidade, quantidade_min, data_criacao
          FROM estoque
          WHERE id_user = :id_user
          ORDER BY data_criacao DESC";

$stmt = $pdo->prepare($query);
$stmt->bindValue(':id_user', $id_user);
$stmt->execute();

$itens = $stmt->fetchAll();

// Retorna JSON
header("Content-Type: application/json");
echo json_encode($itens);
