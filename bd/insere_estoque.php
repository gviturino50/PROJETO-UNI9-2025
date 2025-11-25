<?php
session_start();

// Verifica se o usuário está logado
if (count($_SESSION) == 0) {
    $msg = urlencode("Faça login primeiro");
    header("Location: login.php?status=error&msg={$msg}");
    exit;
}

require_once 'conecta.php';

$nome = trim($_POST['nome'] ?? '');
$descricao = trim($_POST['descricao'] ?? '');
$quantidade = intval($_POST['quantidade'] ?? 0);
$quantidade_min = intval($_POST['quantidade_min'] ?? 0);

$id_user = $_SESSION['user_id'];

try {
    $sql = "INSERT INTO estoque (id_user, nome, descricao, quantidade, quantidade_min)
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$id_user, $nome, $descricao, $quantidade, $quantidade_min])) {
        $msg = urlencode("Item '$nome' cadastrado com sucesso!");
        header("Location: ../estoque.php?status=success&msg={$msg}");
        exit;
    } else {
        $msg = urlencode("Erro ao inserir o item.");
        header("Location: ../estoque.php?status=error&msg={$msg}");
        exit;
    }

} catch (PDOException $e) {
    $msg = urlencode("Erro ao inserir: " . $e->getMessage());
    header("Location: ../estoque.php?status=error&msg={$msg}");
    exit;
}
