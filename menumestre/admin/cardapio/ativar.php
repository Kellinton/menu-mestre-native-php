<?php

// Inclui o arquivo da classe do cardápio para fazer a conexão
require_once('class/cardapio.php');

// Obtém o ID do produto a partir da variável GET
$id = $_GET['id'];

// Instancia a classe ProdutoClass
$produto = new ProdutoClass();

// Define o ID do produto na instância da classe
$produto->idProduto = $id;

// Chama o método Ativar() para ativar o produto
$produto->Ativar();