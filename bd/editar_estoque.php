<?php
require_once 'config.php';
require_once 'conecta.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$quantidade = $_POST['quantidade'];
$descricao = $_POST['descricao'];

try {
    $sql = "UPDATE estoque SET nome=?, quantidade=?, descricao=? WHERE id_item=?";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$nome, $quantidade, $descricao, $id])) {
        $msg = urlencode("Item atualizado com sucesso");
        header("Location: ../estoque.php?status=success&msg={$msg}");
        exit;
    } 
} catch (PDOException $e) {
    $msg = urlencode("Erro ao atualizar: " . $e->getMessage());
    header("Location: ../estoque.php?status=error&msg={$msg}");
    exit;
}
