<?php
require_once 'config.php';
require_once 'conecta.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];
    $descricao = $_POST['descricao'];

    $sql = "UPDATE estoque SET nome=?, quantidade=?, descricao=? WHERE id_item=?";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$nome, $quantidade, $descricao, $id])) {
        header("Location: ../estoque.php?msg=Item atualizado com sucesso");
        exit;
    } else {
        echo "Erro ao atualizar o item.";
    }
}
