<?php

class Database{

    private string $host = 'localhost';
    private string $db = 'ecomm';
    private string $user = 'phpmyadmin';
    private string $pass = '2342';

    private PDO $conexao;
   
    public function __construct(private string $tabela){
        $this->conexao = $this->conectar();
    }

    public function conectar(){
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

    public function executar($query,$parametros = []){
        try{
            $statement = $this->conexao->prepare($query);
            $statement->execute($parametros);
            return $statement;
        }
        catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }
 
    public function cadastrar($valores){    
        $campos = array_keys($valores);
        $binds  = array_pad([],count($campos),'?');
        $query = 'INSERT INTO '.$this->tabela.' ('.implode(',',$campos).') VALUES ('.implode(',',$binds).')';
        $this->executar($query,array_values($valores));
    } 

    public function buscar($where = null, $order = null, $limit = null, $campos = '*'){
        $where = empty($where) ? '' : 'WHERE '. $where;
        $order = empty($order) ? '' : 'ORDER BY '. $order;
        $limit = empty($limit) ? '' : 'LIMIT '. $limit;
        $query = 'SELECT '.$campos.' FROM '.$this->tabela.' '.$where.' '.$order.' '.$limit;
        return $this->executar($query);
    }

    public function update($where,$valores){
        $campos = array_keys($values);
        $query = 'UPDATE '.$this->tabela.' SET '.implode('=?,',$campos).'=? WHERE '.$where;
        $this->executar($query,array_values($valores));
    }

    public function delete($where){
        $query = 'DELETE FROM '.$this->tabela.' WHERE '.$where;
        $this->execute($query);
    }
}


