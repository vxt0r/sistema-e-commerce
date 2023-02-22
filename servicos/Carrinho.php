<?php

require 'Produto.servico.php';

class Carrinho {
 
    public function preencherCarrinho($lista_produtos){
        foreach($_SESSION['produtos'] as $produtos_cliente){
            foreach($lista_produtos as $produtos_lista){
                if($produtos_cliente['id'] == $produtos_lista['id']){
                    $produtos[] =new Produto(
                        $produtos_lista['nome'],
                        $produtos_lista['preco'],
                        $produtos_cliente['qtd'],
                        $produtos_cliente['id']
                    );  
                }
            }
        }
        return $produtos;
    }
    
    public function removerProduto($id){
        foreach( $_SESSION['produtos'] as $i=>$produtos){
            if($id == $produtos['id']){
                unset($_SESSION['produtos'][$i]);
                header('Location: carrinho.php');
            }
        }
    }
    
    public function limparCarrinho(){
        $_SESSION['produtos'] = [];
        header('Location: index.php');
    }
    
    public function valorCompra($produtos){
        $total = 0;
        foreach($produtos as $produto){
            $preco = (float)$produto->__get('preco');
            $qtd =  (int)$produto->__get('qtd');
            $total += $preco * $qtd;
        }
        return $total;
    }
   
}