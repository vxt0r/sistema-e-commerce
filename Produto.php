<?php

class Produto{
    public function __construct(private $nome,private $preco,private $qtd, private $id){}

    public function __get($atributo){
        return $this->$atributo;
    }
}