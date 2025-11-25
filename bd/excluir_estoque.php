<?php
require_once 'config.php';
require_once 'conecta.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM estoque WHERE id_item=?";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$id])) {
        header("Location: listar_estoque.php?msg=Item excluído com sucesso");
        exit;
    } else {
        echo "Erro ao excluir o item.";
    }
}
