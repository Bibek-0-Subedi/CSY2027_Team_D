<?php

class Databasetable{
    private $table; 
    private $pdo;
    private $field; 
    private $value;

    function __construct($table){
        $this->pdo = new PDO('mysql:dbname=csy2028groupassignment;host=localhost','root','');
        $this->table = $table;
    }

    function insert($record){
        $keys = array_keys($record);
        $keysComma = implode(', ', $keys);
        $keysColon = implode(', :', $keys);
        $stmt = $this->pdo->prepare("INSERT INTO $this->table($keysComma) VALUES(:$keysColon)");
        if($stmt->execute($record))
            return true;
        else
            return false;
    }

    function findAll(){
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        return $stmt;
    }
}
?>