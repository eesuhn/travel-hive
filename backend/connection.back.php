<?php

class Database{
    private $host = "localhost";
    private $user = "root";
    private $pwd = "root";
    private $dbnName = "travelhive";

    protected function connect(){
        try{
        $dsn = 'mysql:host=' .$this->host . ';dbname=' .$this->dbnName;
        $pdo = new PDO($dsn,$this->user,$this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        return $pdo;
        }catch (PDOException $e){
            print "Error!: " .$e->getMessage();
            die();
        }
    }

    

}
?>