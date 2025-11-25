<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Usuário NÃO logado
    echo '
    <header class="fixed top-0 left-0 w-full text-white shadow-md z-50 bg-white p-2">
      <div class="max-w-6xl mx-auto flex items-center justify-between px-4 py-3 w-full text-black">
        <div class="flex items-center gap-4">
          <img src="img/logo.png" alt="Logo GestorPlus"
              class="w-16 h-16 rounded-full object-cover">
          <h1 class="text-xl font-semibold">GestorPlus</h1>
        </div>
        <nav class="space-x-4">
          <a href="index.php" class="hover:underline">Início</a>
          <a href="sobreNos.php" class="hover:underline">Sobre nós</a>
          <a href="login.php" class="hover:underline">Entrar</a>
        </nav>
      </div>
    </header>';
} else {
    // Usuário LOGADO
    echo '
    <header class="fixed top-0 left-0 w-full text-white shadow-md z-50 bg-white p-2">
      <div class="max-w-6xl mx-auto flex items-center justify-between px-4 py-3 w-full text-black">
        <div class="flex items-center gap-4">
          <img src="img/logo.png" alt="Logo GestorPlus"
              class="w-16 h-16 rounded-full object-cover">
          <h1 class="text-xl font-semibold">GestorPlus</h1>
        </div>
        <nav class="space-x-4">
          <a href="logout.php" class="text-black font-semibold hover:underline">Sair</a>
        </nav>
      </div>
    </header>';
}
?>
