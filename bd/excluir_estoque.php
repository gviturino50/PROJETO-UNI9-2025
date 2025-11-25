<?php
require_once 'config.php';
require_once 'conecta.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $sql = "DELETE FROM estoque WHERE id_item=?";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute([$id])) {
            $msg = urlencode("Item excluído com sucesso");
            header("Location: listar_estoque.php?status=success&msg={$msg}");
            exit;
        } else {
            $msg = urlencode("Nenhum item foi excluído. O ID {$id} pode não existir.");
            header("Location: listar_estoque.php?status=error&msg={$msg}");
            exit;
        }

    } catch (PDOException $e) {
        $msg = urlencode("Erro ao excluir o item: " . $e->getMessage());
        header("Location: listar_estoque.php?status=error&msg={$msg}");
        exit;
    }
} else {
    $msg = urlencode("ID inválido para exclusão");
    header("Location: listar_estoque.php?status=error&msg={$msg}");
    exit;
}
