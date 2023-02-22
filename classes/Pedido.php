<?php

class Pedido{
    public function __construct(private array $produtos,
    private string $forma_pagamento,private float $total){}

    public function __get($atributo){
        return $this->$atributo;
    }

}