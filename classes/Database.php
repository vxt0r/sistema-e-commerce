<?php

namespace classes;

require_once 'vendor/autoload.php';

use PDO;
use PDOStatement;

class Database{

    private string $host = 'localhost';
    private string $db = 'ecomm';
    private string $user = 'phpmyadmin';
    private string $pass = '2342';

    private PDO $conexao;
   
    public function __construct(){
        $this->conexao = $this->conectar();
    }

    public function conectar():PDO{
        try{
            $conexao = new PDO(
                "mysql:host=$this->host;dbname=$this->db",
                "$this->user",
                "$this->pass"
            );
            return $conexao;
        
        }catch(PDOException $e){
                echo '<p>'. $e->getMessage() . '</p>';
        }
    }

    public function executarQuery(string $query,array $parametros=[]):PDOStatement{
        $statement = $this->conexao->prepare($query);

        if(count($parametros) > 0){
            foreach($parametros as $i=>$parametro){
                $statement->bindValue($i + 1,$parametro);
            }
        }
        $statement->execute();
        return $statement;
    } 
}


