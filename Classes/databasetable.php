<?php

class Databasetable{
    private $table; private $pdo;private $field; private $value;
    function __construct($table){
        $this->pdo = new PDO('mysql:dbname=csy2028groupassignment;host=localhost','root','');
        $this->table = $table;
    }
}
?>