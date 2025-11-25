<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?status=error&msg=Faça login primeiro");
    exit;
}

require_once 'conecta.php'; // ajuste o caminho se necessário

$nome = trim($_POST['nome'] ?? '');
$descricao = trim($_POST['descricao'] ?? '');
$quantidade = intval($_POST['quantidade'] ?? 0);
$quantidade_min = intval($_POST['quantidade_min'] ?? 0);

$id_user = $_SESSION['user_id'];

try {
    $query = "INSERT INTO estoque (id_user, nome, descricao, quantidade, quantidade_min)
              VALUES (:id_user, :nome, :descricao, :quantidade, :quantidade_min)";

    $stmt = $pdo->prepare($query);

    $stmt->bindValue(':id_user', $id_user);
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':descricao', $descricao);
    $stmt->bindValue(':quantidade', $quantidade, PDO::PARAM_INT);
    $stmt->bindValue(':quantidade_min', $quantidade_min, PDO::PARAM_INT);

    $stmt->execute();

    $msg = urlencode("Item '$nome' cadastrado com sucesso!");
    header("Location: ../estoque.php?status=success&msg={$msg}");
    exit;

} catch (PDOException $e) {
    $msg = urlencode("Erro ao inserir: " . $e->getMessage());
    header("Location: ../estoque.php?status=error&msg={$msg}");
    exit;
}
