<?php
session_start();
require_once 'conecta.php';

$email = trim($_POST['email'] ?? '');
$senha_pura = $_POST['senha'] ?? '';

$senha_hash = password_hash($senha_pura, PASSWORD_DEFAULT);

try {
    $sql = "INSERT INTO user (email, senha) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email, $senha_hash]);

    $user_id = $pdo->lastInsertId();
    $_SESSION['user_id'] = $user_id;


    $msg = urlencode("Usuário '" . htmlspecialchars($email) . "' cadastrado com sucesso! ID: {$user_id}");
    header("Location: ../estoque.php?status=success&msg={$msg}");
    exit;

} catch (PDOException $e) {
    if ($e->getCode() === '23000') {
        $msg = urlencode("O email '" . htmlspecialchars($email) . "' já está cadastrado. Tente outro.");
    } else {
        $msg = urlencode("Erro ao cadastrar: " . $e->getMessage());
    }
    header("Location: ../index.php?status=error&msg={$msg}");
    exit;
}
