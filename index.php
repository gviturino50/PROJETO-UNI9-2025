<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Estoque</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>

  <?php
    include "topbar.php";
  ?>

  <main class="flex flex-col gap-20 my-36 px-4 max-w-6xl mx-auto">
    <div class="flex items-center gap-16">
      <div>
        <h1 class="text-3xl font-bold mb-6">Controle seu estoque  <br>com precisão e simplicidade. </h1>
        <p class="text-gray-600 mb-4 text-xl font-light">
          Visualize entradas, saídas, níveis mínimos e relatórios em poucos cliques, garantindo mais organização e agilidade para o seu negócio.
        </p>
        <p class="text-gray-600 text-xl font-light mb-3">
          Tudo isso, na palma da sua mão!
        </p>

        <button
          class="rounded-full border border-orange-400 p-2 border-2 text-orange-400 text-md mt-4 hover:bg-orange-400 hover:text-white"
          onclick="window.location.href='cadastro.php'"
          >
          Crie sua conta agora
        </button>
      </div>
      <img src="img/homem-no-celular.png" alt="Logo GestorPlus"
            class="w-[500px] h-[500-px] object-cover">
    </div>

    <!-- Exemplo de conteúdo longo -->
    <div class="flex justify-between bg-orange-400 mt-6 rounded-[40px] p-16 gap-8 items-center">
      <img src="img/tempo.png" alt="Logo GestorPlus"
            class="w-[400px] h-[400-px] object-cover rounded-full">

      <div class="w-full">
        <p class="text-[#001f3d] text-3xl font-semibold text-center ">
          Economize tempo nas tarefas do dia a dia
        </p>

        <p class="text-[#001f3d] text-xl font-semibold text-center mt-12">
          Com uma interface simples e organizada, o sistema facilita o controle de produtos, registros de entradas e saídas e acompanhamento do estoque, tornando seu trabalho mais rápido e prático.
        </p>
      </div>
    </div>

    <div class="mt-6">
      <p class="text-3xl font-semibold text-orange-400 w-full text-center">
            Funcionalidades para você
      </p>

      <div class="flex gap-6 mt-8 justify-center">
        <div class="flex flex-col items-center border-2 border-orange-400 p-12 rounded-lg w-full gap-12">
          <p class="text-2xl font-semibold text-orange-400 text-start w-full">
            Cadastro <br> de Produtos
          </p>

          <img src="img/cadastroIcon.png" alt="Cadastro Icon"
              class="w-[60px] h-[60px]">

          <p class="text-xl">
            Organize seu catálogo com fotos, categorias, códigos e valores.
          </p>
        </div>

        <div class="flex flex-col items-center border-2 border-orange-400 p-12 rounded-md w-full gap-12">
          <p class="text-2xl font-semibold text-orange-400">
            Movimentação de Estoque
          </p>

          <img src="img/movimentacaoIcon.png" alt="Cadastro Icon"
              class="w-[60px] h-[60px]">

          <p class="text-xl">
            Registre entradas e saídas de forma rápida e evite inconsistências.
          </p>
        </div>

        <div class="flex flex-col items-center border-2 border-orange-400 p-12 rounded-md w-full gap-12">
          <p class="text-2xl font-semibold text-orange-400">
            Alertas de Estoque Baixo
          </p>

          <img src="img/alertaIcon.png" alt="Cadastro Icon"
              class="w-[60px] h-[60px]">

          <p class="text-xl">
            Mantenha o controle com avisos quando um produto estiver perto de acabar.
          </p>
        </div>
      </div>
    </div>
  </main>

  <?php
    require_once 'bd/conecta.php';
    include "footer.html";
  ?>

</html>
