<?php
require_once 'conecta.php';

session_start(); // iniciar sessão antes de usar $_SESSION

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (!$email || !$senha) {
        header("Location: ../login.php?status=error&msg=Preencha todos os campos");
        exit;
    }

    $stmt = $pdo->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user && password_verify($senha, $user['senha'])) {
        // Login bem-sucedido
        $_SESSION['user_id'] = $user['id_user'];
        header("Location: ../estoque.php");
        exit;
    } else {
        header("Location: ../login.php?status=error&msg=Email ou senha inválidos");
        exit;
    }
} else {
    // Se acessar diretamente sem POST, apenas mostra o formulário
    header("Location: ../login.php");
    exit;
}
