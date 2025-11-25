<?php
session_start();

// limpa tudo
$_SESSION = [];
session_destroy();

// redireciona para a home
header("Location: index.php");
exit;
?>
