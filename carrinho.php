<?php

require 'classes/Produto.php';
session_start();

if(isset($_GET['adicionar'])){

    $novo_produto = new Produto;
    $novo_produto->__set('nome',$_POST['nome']);
    $novo_produto->__set('preco',$_POST['preco']);
    $novo_produto->__set('qtd',$_POST['qtd']);
    $novo_produto->__set('id',$_POST['id']);

    (new Produto)->adicionarProduto($novo_produto);
}

if(isset($_GET['limpar'])){
    unset($_SESSION['carrinho']);
}

if(isset($_GET['remover'])){
    foreach($_SESSION['carrinho'] as $i=>$produto){
        if($produto->__get('id') == $_GET['id']){
            unset($_SESSION['carrinho'][$i]);
        }
    }
}

include_once 'includes/carrinho-view.php';

?>

