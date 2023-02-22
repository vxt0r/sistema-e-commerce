<?php

require 'classes/Produto.php';

class ProdutoServico{

    public function recuperarTodosProdutos($conexao){
        $query = 'SELECT * FROM produtos';
        $result = $conexao->query($query) or die($conexao->error);
        $lista_produtos = [];
        while($prod = $result->fetch_assoc()){
            $lista_produtos[] = $prod;
        }
        return $lista_produtos;
    }
    
    public function recuperarProduto($conexao,$id){
        $query = "SELECT * FROM produtos where id = '$id'";
        $result = $conexao->query($query) or die($conexao->error);
        $produto = $result->fetch_assoc();
        return $produto;
    }

    public function adicionarProdutos($id,$qtd){
        foreach($_SESSION['produtos'] as $produtos){
            if($produtos['id'] == $id){
                header('Location: index.php');
                return;
            }
        }
        $_SESSION['produtos'][] = ['id'=>$id,'qtd'=>$qtd];
    }
}


$lista_produtos = (new ProdutoServico) ->recuperarTodosProdutos($conexao);
