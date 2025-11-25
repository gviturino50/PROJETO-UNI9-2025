<?php
session_start();
require_once 'conecta.php';

$email = trim($_POST['email'] ?? '');
$senha = $_POST['senha'] ?? '';

if (!$email || !$senha) {
    $msg = urlencode("Preencha todos os campos");
    header("Location: ../login.php?status=error&msg={$msg}");
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user && password_verify($senha, $user['senha'])) {
        $_SESSION['user_id'] = $user['id_user'];
        header("Location: ../estoque.php");
        exit;
    } 
} catch (PDOException $e) {
    $msg = urlencode("Erro ao conectar: " . $e->getMessage());
    header("Location: ../login.php?status=error&msg={$msg}");
    exit;
}
