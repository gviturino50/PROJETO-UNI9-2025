<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>

  <?php include "topbar.php"; ?>

  <body class="px-28 mt-36 bg-gray-50">

    <!-- Header -->
    <div class="flex w-full justify-between my-6">
      <h1 class="text-3xl font-bold">Controle de Estoque</h1>

      <button
        onclick="openModal()"
        class="px-4 py-2 bg-orange-400 text-white rounded-lg hover:bg-orange-700"
      >
        + Adicionar Item
      </button>
    </div>

    <!-- Lista -->
    <div id="listaEstoque"></div>

    <!-- Modal Novo Item -->
    <div
      id="modalNovo"
      class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    >
      <div class="bg-white w-full max-w-md rounded-xl shadow-xl p-6 relative">

        <button
          onclick="closeModal()"
          class="absolute top-3 right-3 text-gray-600 hover:text-black"
        >✖</button>

        <h2 class="text-xl font-bold mb-4">Cadastrar Item</h2>

        <form action="bd/insere_estoque.php" method="POST" class="space-y-4">
          <div>
            <label class="block font-medium">Nome do item *</label>
            <input type="text" name="nome" required class="w-full border rounded-lg p-2" />
          </div>

          <div>
            <label class="block font-medium">Descrição</label>
            <textarea name="descricao" class="w-full border rounded-lg p-2"></textarea>
          </div>

          <div>
            <label class="block font-medium">Quantidade *</label>
            <input type="number" name="quantidade" min="1" required class="w-full border rounded-lg p-2" />
          </div>

          <div>
            <label class="block font-medium">Quantidade mínima</label>
            <input type="number" name="quantidade_min" min="0" class="w-full border rounded-lg p-2" />
          </div>

          <button
            type="submit"
            class="w-full bg-orange-400 text-white py-2 rounded-lg hover:bg-orange-700"
          >
            Salvar
          </button>
        </form>

      </div>
    </div>

    <!-- Modal de Edição -->
    <div
      id="modalEditar"
      class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    >
      <div class="bg-white w-full max-w-md rounded-xl shadow-xl p-6 relative">

        <button
          onclick="closeModalEdicao()"
          class="absolute top-3 right-3 text-gray-600 hover:text-black"
        >✖</button>

        <h2 class="text-xl font-bold mb-4">Editar Item</h2>

        <form id="formEditar" method="POST" action="bd/editar_estoque.php" class="space-y-4">
          <input type="hidden" name="id" id="edit_id" />

          <div>
            <label class="block font-medium">Nome do item *</label>
            <input type="text" name="nome" id="edit_nome" required class="w-full border rounded-lg p-2" />
          </div>

          <div>
            <label class="block font-medium">Quantidade *</label>
            <input type="number" name="quantidade" id="edit_quantidade" min="1" required class="w-full border rounded-lg p-2" />
          </div>

          <div>
            <label class="block font-medium">Descrição</label>
            <input type="text" name="descricao" id="edit_descricao" class="w-full border rounded-lg p-2" />
          </div>

          <button
            type="submit"
            class="w-full bg-orange-400 text-white py-2 rounded-lg hover:bg-orange-700"
          >
            Salvar Alterações
          </button>
        </form>

      </div>
    </div>
  </body>
</html>

<script>
function openModal() {
  document.getElementById("modalNovo").classList.remove("hidden");
}

function closeModal() {
  document.getElementById("modalNovo").classList.add("hidden");
}

function openEditModal() {
  document.getElementById("modalEditar").classList.remove("hidden");
}

function closeModalEdicao() {
  document.getElementById("modalEditar").classList.add("hidden");
}

function formatarDataHora(dataIso) {
  if (!dataIso) return "";

  const data = new Date(dataIso);

  const dia = String(data.getDate()).padStart(2, "0");
  const mes = String(data.getMonth() + 1).padStart(2, "0");
  const ano = data.getFullYear();

  const horas = String(data.getHours()).padStart(2, "0");
  const minutos = String(data.getMinutes()).padStart(2, "0");

  return `${dia}/${mes}/${ano} às ${horas}:${minutos}`;
}

/* --------- FUNÇÃO DE TEMPLATE DO ITEM --------- */
function templateItemCard(item) {
  return `
    <div class="flex p-6 bg-white rounded-md mb-4 items-center">

      <h3 class="text-lg font-bold w-2/4">${item.nome}</h3>

      <div class="flex w-3/4">
        <p class="font-semibold">Desc:</p>
        <p class="text-gray-500 ml-2">${item.descricao ?? ""}</p>
      </div>

      <div class="flex w-2/4">
        <p class="font-semibold">Quantidade:</p>
        <p class="text-gray-500 ml-2">${item.quantidade ?? ""}</p>
      </div>

      <div class="flex w-3/4">
        <p class="font-semibold">Criado em:</p>
        <p class="text-gray-500 ml-2">${formatarDataHora(item.data_criacao)}</p>
      </div>

      <div class="items-center w-2/4 flex gap-2">

        <button
          onclick="excluirItem(${item.id_item})"
          class="px-3 py-1 rounded"
        >
          <svg xmlns="http://www.w3.org/2000/svg" fill="none"
              viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
              class="w-8 h-6 text-black">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21
                c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673
                a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077
                L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12
                .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397
                m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32
                0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667
                0 00-7.5 0" />
          </svg>
        </button>

        <button
          class="px-3 border border-orange-400 text-orange-400 py-1 rounded"
          data-id="${item.id_item}"
          data-nome="${item.nome}"
          data-quantidade="${item.quantidade}"
          data-descricao="${item.descricao ?? ''}"
          onclick="abrirModalEdicao(this)"
        >
          Editar
        </button>

      </div>
    </div>
  `;
}

async function carregarEstoque() {
  const resposta = await fetch("bd/pegar_estoque.php");
  const itens = await resposta.json();

  const lista = document.getElementById("listaEstoque");

  if (itens.length === 0) {
    lista.innerHTML = `
      <div class="flex flex-col items-center justify-center py-16 text-gray-500">
        <img src="img/caixa.png" alt="Caixa vazia"
            class="w-[300px] h-[300-px]">

        <p class="text-xl font-semibold mb-2">Nenhum item no estoque</p>
        <p class="text-gray-400">Clique no botão acima para adicionar</p>
      </div>
    `;
    return;
  }

  lista.innerHTML = itens.map(templateItemCard).join("");
}

async function excluirItem(id) {
  if (!confirm("Tem certeza que deseja excluir este item?")) return;

  await fetch(`bd/excluir_estoque.php?id=${id}`);
  carregarEstoque();
}

function abrirModalEdicao(botao) {
  const { id, nome, quantidade, descricao } = botao.dataset;

  document.getElementById("edit_id").value = id;
  document.getElementById("edit_nome").value = nome;
  document.getElementById("edit_quantidade").value = quantidade;
  document.getElementById("edit_descricao").value = descricao;

  openEditModal();
}

/* --------- INICIALIZA --------- */
carregarEstoque();
</script>
