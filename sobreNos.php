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
        <h1 class="text-3xl font-bold mb-6">Sobre o GestorPlus</h1>

        <p class="text-gray-600 mb-4 text-xl font-light">
          O GestorPlus nasceu como um projeto voltado para simplificar o controle de estoque de micro e pequenos negócios, MEIs e profissionais autônomos.
        </p>

        <p class="text-gray-600 mb-4 text-xl font-light">
          Nosso objetivo é oferecer uma solução acessível, intuitiva e funcional, que ajude empreendedores a organizarem seus produtos e manterem o estoque sempre atualizado — sem complicação.
        </p>

        <p class="text-gray-600 text-xl font-light">
          O sistema foi desenvolvido com foco em rapidez, facilidade de uso e clareza nas informações, ajudando empresas a economizarem tempo e reduzirem erros no dia a dia.
        </p>
      </div>

      <img src="img/time.png" alt="Equipe" class="w-[450px] h-[450px rounded-full">
    </div>

    <div class="flex justify-between bg-orange-400 mt-6 rounded-[40px] p-16 gap-8 items-center">
      <img src="img/estoque.png" alt="Missão" class="w-[450px] h-[450px] object-cover rounded-full">

      <div class="w-full">
        <p class="text-[#001f3d] text-4xl text-center">
          Nossa missão
        </p>

        <p class="text-[#001f3d] text-xl font-semibold text-center mt-12">
          Tornar o controle de estoque acessível e eficiente para qualquer empreendedor, ajudando negócios a crescerem por meio de organização, praticidade e informações claras.
        </p>
      </div>
    </div>

    <div class="flex mt-6 gap-20">
      <div class="flex flex-col gap-6">
        <p class="text-5xl text-orange-400 w-full text-start">
          Nossos valores
        </p>

        <p class="text-xl text-orange-400 w-full text-start">
          Expressam aquilo em que acreditamos e representam o melhor de nós.
        </p>
        <img src="img/valores.png" alt="Logo GestorPlus"
              class="w-[450px] h-[450-px] object-cover rounded-full">
      </div>


      <div class="flex flex-col gap-6 justify-center">
        <div class="flex items-center bg-orange-400 p-8 rounded-l-full rounded-r-xl w-full gap-12">
          <p class="text-6xl text-white font-light">
            #1
          </p>
          <div>
            <p class="text-4xl font-light text-white">Simplicidade</p>
            <p class="text-xl mt-5">
              Interface clara e fácil de usar, pensada para todos os tipos de usuários.
            </p>
          </div>
        </div>

        <div class="flex items-center bg-orange-400 p-8 rounded-l-full rounded-r-xl w-full gap-12">
          <p class="text-6xl text-white font-light">
            #2
          </p>
          <div>
            <p class="text-4xl font-light text-white">Agilidade</p>
            <p class="text-xl mt-5">
              Funções rápidas e diretas para facilitar o gerenciamento diário.
            </p>
          </div>
        </div>

        <div class="flex items-center bg-orange-400 p-8 rounded-l-full rounded-r-xl w-full gap-12">
          <p class="text-6xl text-white font-light">
            #3
          </p>
          <div>
            <p class="text-4xl font-light text-white">Confiabilidade</p>
            <p class="text-xl mt-5">
              Informações organizadas e seguras para decisões mais assertivas.
            </p>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php
    include "footer.html";
  ?>
</html>
