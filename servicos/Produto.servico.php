<?php

require 'classes/Produto.php';

class ProdutoServico{

    public function recuperarTodosProdutos(PDO $conexao):array{
        $buscar = 'SELECT * FROM produtos';
        $stmt = $conexao->prepare($buscar);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function recuperarProduto(PDO $conexao,int $id):array{
        $buscar = "SELECT * FROM produtos where id = :id";
        $stmt = $conexao->prepare($buscar);
        $stmt->bindValue(':id',$id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function adicionarProdutos(int $id,int $qtd):void{
        foreach($_SESSION['produtos'] as $produtos){
            if($produtos['id'] == $id){
                $i = array_search($produtos,$_SESSION['produtos']);
                $_SESSION['produtos'][$i]['qtd'] += $qtd;
                header('Location: index.php'); 
                return;
            }
        }
        $_SESSION['produtos'][] = ['id'=>$id,'qtd'=>$qtd];
        header('Location: index.php');
        return;
    }
}


$lista_produtos = (new ProdutoServico) ->recuperarTodosProdutos($conexao);
