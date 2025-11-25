<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

  <div class="bg-white shadow-xl p-10 rounded-3xl w-full max-w-xl">

    <h1 class="text-3xl font-bold text-gray-900 mb-3">
      Que bom ter você aqui!
    </h1>

    <p class="text-gray-700 mb-10 text-lg leading-relaxed">
      Para começarmos, precisamos de algumas informações básicas.
    </p>

    <form
      id="formCadastro"
      class="flex flex-col gap-6"
      method="post"
      action="bd/insere_cadastro.php"
    >

      <div>
        <input type="email" placeholder="Informe seu e-mail" id="email" name="email" required
          class="w-full border border-gray-300 rounded-md px-4 py-3 text-lg focus:outline-none focus:border-orange-400">
      </div>

      <div class="relative">
        <input id="senha" name="senha" type="password" placeholder="Crie uma senha" required
          class="w-full border border-gray-300 rounded-md px-4 py-3 text-lg focus:outline-none focus:border-orange-400">

        <button
          type="button"
          class="toggleSenha absolute right-4 top-1/2 -translate-y-1/2"
          data-input="senha"
        >
          <svg class="w-6 h-6 text-[#001f3d]" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36
              4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431
              0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007
              -9.963-7.178z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
        </button>
      </div>

      <div class="relative">
        <input id="confirmar-senha" type="password" placeholder="Confirme a senha" required
          class="w-full border border-gray-300 rounded-md px-4 py-3 text-lg focus:outline-none focus:border-orange-400">

        <button
          type="button"
          class="toggleSenha absolute right-4 top-1/2 -translate-y-1/2"
          data-input="confirmar-senha"
        >
          <svg class="w-6 h-6 text-[#001f3d]" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36
              4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431
              0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007
              -9.963-7.178z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
        </button>
      </div>

      <p class="text-center text-sm text-gray-700 leading-relaxed mt-3">
        Ao cadastrar-me, declaro que aceito os
        <a href="#" class="text-orange-500 font-semibold hover:underline">Termos</a>
        e
        <a href="#" class="text-orange-500 font-semibold hover:underline">Privacidade</a>.
      </p>

      <div class="flex justify-between mt-6 items-center">
        <button type="button"
          class="text-orange-500 text-lg font-semibold hover:underline"
          onclick="window.location.href='index.php'">
          Voltar
        </button>

        <button
          class="bg-orange-500 text-white text-lg font-semibold px-10 py-3 rounded-2xl hover:bg-orange-600 transition"
          type="submit">
          Continuar
        </button>
      </div>

    </form>

  </div>

</body>
</html>

<script>
const eyeOpen = `
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
  d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36
  4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431
  0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007
  -9.963-7.178z" />
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
`;

const eyeClosed = `
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
  d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338
  7.244 19.5 12 19.5c.993 0 1.957-.138
  2.87-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756
  0 8.773 3.162 10.065 7.5a10.522 10.522 0
  01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65
  3.65m8.894 8.894L21 21m-3.228-3.228l-3.65-3.65" />
`;

document.querySelectorAll(".toggleSenha").forEach(btn => {
  btn.addEventListener("click", () => {
    const input = document.getElementById(btn.dataset.input);
    const svg = btn.querySelector("svg");

    if (input.type === "password") {
      input.type = "text";
      svg.innerHTML = eyeClosed;
    } else {
      input.type = "password";
      svg.innerHTML = eyeOpen;
    }
  });
});

// ------------------ Confirmar senha ------------------

document.getElementById("formCadastro").addEventListener("submit", (e) => {
  const senha = document.getElementById("senha").value;
  const confirmar = document.getElementById("confirmar-senha").value;

  if (senha !== confirmar) {
    e.preventDefault();
    alert("As senhas não coincidem!");
  }
});
</script>
