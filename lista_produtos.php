<?php

require 'Conexao.php';

function recuperarTodosProdutos($conexao){
    $query = 'SELECT * FROM produtos';
    $result = $conexao->query($query) or die($conexao->error);
    $lista_produtos = [];
    while($prod = $result->fetch_assoc()){
        $lista_produtos[] = $prod;
    }
    return $lista_produtos;
}

function recuperarProduto($conexao,$id){
    $query = "SELECT * FROM produtos where id = '$id'";
    $result = $conexao->query($query) or die($conexao->error);
    $produto = $result->fetch_assoc();
    return $produto;
}

$lista_produtos = recuperarTodosProdutos($conexao);
