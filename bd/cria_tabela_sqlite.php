<?php
function criaTabelaUsuario(PDO $pdo) {
  $query = "CREATE TABLE IF NOT EXISTS USER(
      id_user INTEGER PRIMARY KEY AUTOINCREMENT,
      email TEXT NOT NULL UNIQUE,
      senha TEXT NOT NULL
  )";
  $pdo->exec($query);
}

function criaTabelaEstoque(PDO $pdo) {
  $query = "CREATE TABLE IF NOT EXISTS estoque (
    id_item INTEGER PRIMARY KEY AUTOINCREMENT,
    id_user INTEGER NOT NULL,
    nome TEXT NOT NULL,
    descricao TEXT,
    quantidade INTEGER NOT NULL,
    quantidade_min INTEGER NOT NULL DEFAULT 0,
    data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES user(id_user)
  )";
  $pdo->exec($query);
}
