<?php

require 'classes/Conexao.php';

class Produto{
    public function __construct(
        private string $nome,
        private float $preco,
        private int $qtd, 
        private int $id
        ){}

    public function __get($atributo){
        return $this->$atributo;
    }
}