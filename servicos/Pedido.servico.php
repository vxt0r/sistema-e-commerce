<?php

require 'classes/Pedido.php';

class PedidoServico{
    public function formaPagamento($i){
        $forma = match(intval($i)){
            1 => 'Cartão de Crédito',
            2 => 'Boleto',
            3 => 'Pix' 
        };
        return $forma;
    }

}