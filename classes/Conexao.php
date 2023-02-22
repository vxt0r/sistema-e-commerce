<?php

class Conexao{
    private $host = 'localhost';
    private $user = 'phpmyadmin';
    private $pass = '2342';
    private $db = 'ecomm';

    public function conectar(){
        $conexao = new mysqli($this->host,$this->user,$this->pass,$this->db);
        return $conexao;
    }
}

$conexao = (new Conexao)->conectar();
