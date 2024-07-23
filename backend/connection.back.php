<?php
    class Database{
        private $host = "localhost";
        private $user = "root";
        private $pwd = "";
        private $dbName = "travelhive";
        
        // add port if needed
        // private $port = ;

        protected function connect () {
            try{
                // remove comment block when added port
                $dsn = 'mysql:host=' .$this->host .';dbname=' .$this->dbName /*.';port=' .$this->port*/;
                $pdo = new PDO($dsn, $this->user, $this->pwd);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
                return $pdo;
            }catch (PDOException $e){
                print "Error: " .$e->getMessage();
                die();
            }
        }
    }
?>