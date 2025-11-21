<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 flex items-center justify-center min-h-screen">

  <div class="bg-white w-full max-w-md p-10 rounded-2xl shadow-lg">
    <h1 class="text-3xl font-bold mb-2">Bem vindo</h1>
    <p class="text-gray-600 mb-6">
      Por favor, insira o e-mail e senha da sua conta para acessar.
    </p>

    <!-- FORMULÁRIO FUNCIONAL -->
    <form method="post" action="bd/login.php">
      <div class="mb-4">
        <label class="block text-gray-800 mb-1 font-medium">E-mail</label>
        <input
          type="email"
          name="email"
          placeholder="E-mail"
          class="w-full border-2 border-gray-300 focus:border-orange-400 outline-none rounded-lg p-3 text-lg"
          required
        >
      </div>

      <div class="mb-2">
        <label class="block text-gray-800 mb-1 font-medium">Senha</label>
        <div class="relative">
          <input
            id="senha"
            name="senha"
            type="password"
            placeholder="Senha"
            class="w-full border-2 border-gray-300 focus:border-orange-400 outline-none rounded-lg p-3 text-lg"
            required
          >
          <button
            type="button"
            onclick="toggleSenha('senha', this)"
            class="absolute right-4 top-1/2 -translate-y-1/2"
          >
            <svg class="w-6 h-6 text-[#001f3d]" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36
                4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431
                0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007
                -9.963-7.178z" />
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
          </button>
        </div>
      </div>

      <div class="flex justify-between items-center mt-4">
        <button
          type="button"
          class="text-orange-500 text-lg font-bold"
          onclick="window.location.href='cadastro.php'"
        >
          Criar conta
        </button>

        <button
          type="submit"
          class="bg-orange-500 text-white px-8 py-3 rounded-full text-lg font-bold"
        >
          Entrar
        </button>
      </div>
    </form>
    <!-- FIM FORMULÁRIO -->

  </div>

</body>
</html>

<script>
function toggleSenha(idInput, btn) {
  const input = document.getElementById(idInput);
  const svg = btn.querySelector("svg");

  const eyeOpen = `
    <path stroke-linecap="round" stroke-linejoin="round"
      d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36
      4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431
      0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007
      -9.963-7.178z" />
    <path stroke-linecap="round" stroke-linejoin="round"
      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />`;

  const eyeClosed = `
    <path stroke-linecap="round" stroke-linejoin="round"
      d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338
      7.244 19.5 12 19.5c.993 0 1.957-.138
      2.87-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756
      0 8.773 3.162 10.065 7.5a10.522 10.522 0
      01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65
      3.65m8.894 8.894L21 21m-3.228-3.228l-3.65-3.65m0
      0a3 3 0 10-4.243-4.243m4.243
      4.243L9.88 9.88" />`;

  if (input.type === "password") {
    input.type = "text";
    svg.innerHTML = eyeClosed;
  } else {
    input.type = "password";
    svg.innerHTML = eyeOpen;
  }
}
</script>
