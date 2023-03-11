<?php

namespace classes;

require_once 'vendor/autoload.php';

use classes\Database;
use PDO;

class Produto{
    private string $nome;
    private float $preco;         
    private int $qtd; 
    private int $id;

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function recuperarProdutosDb():array{
        $query = 'SELECT * FROM produtos';
        $statement = (new Database)->executarQuery($query);
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function calcularTotal():float{
        $total = 0;
        foreach($_SESSION['carrinho'] as $produto){
            $total += $produto->__get('preco') * $produto->__get('qtd'); 
        }
        return $total;
    }

    public function verificarCarrinho(Produto $novo_produto):bool{
        foreach($_SESSION['carrinho'] as $i=>$produto){
            if($novo_produto->__get('nome') == $produto->__get('nome')){
                $valor = $produto->__get('qtd') + $novo_produto->__get('qtd');
                $_SESSION['carrinho'][$i]->__set('qtd',$valor);
                return true;
            }
        }
        return false;
    }

    public function adicionarProduto(Produto $novo_produto):void{
        if(!empty($_SESSION['carrinho'])){
            $produto_existente = (new Produto)->verificarCarrinho($novo_produto);

            if(!$produto_existente){
                $_SESSION['carrinho'][] = $novo_produto;
            }
        }
        else{
            $_SESSION['carrinho'][] = $novo_produto;
        }
    }
}