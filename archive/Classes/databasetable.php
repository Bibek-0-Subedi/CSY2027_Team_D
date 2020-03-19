<?php
class Databasetable{
    private $table; 
    private $pdo;
    private $field; 
    private $value;

    public function __construct($table){
        $this->pdo = new PDO('mysql:dbname=csy2027groupassignment;host=localhost','root','');
        $this->table = $table;
    }

    public function insert($record){
        $keys = array_keys($record);
        $keysComma = implode(', ', $keys);
        $keysColon = implode(', :', $keys);
        $stmt = $this->pdo->prepare("INSERT INTO $this->table($keysComma) VALUES(:$keysColon)");
        if($stmt->execute($record))
            return true;
        else
            return false;
    }

    public function findAll(){
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        return $stmt;
    }

    public function find($field, $value){
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE $field = '$value'");
        $criteria = [
            $value => $value
        ];
        $stmt->execute($criteria);
        return $stmt;
    }

    public function update($record, $pk){
        $keys = array_keys($record);
        $updateList = [];
        foreach($keys as $key){
            $updateList[] = $key . " = :" . $key;
        }
        $updateList = implode(', ', $updateList);
        $stmt = $this->pdo->prepare("UPDATE $this->table SET $updateList WHERE $pk = :pk");
        $record['pk'] = $record[$pk];
        if($stmt->execute($record))
            return true;
        else
            return false;
    }

    function save($data, $pk= ''){
        try{
            $result = $this->insert($data);
        }catch(Exception $e){

        }
        
        try{
            $result = $this->update($data, $pk);
        }catch(Exception $e){

        }
        
        return $result;
    }
}
?>