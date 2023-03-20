## Travel Hive

<img src="https://user-images.githubusercontent.com/102596628/226254835-1fbf3033-1cd9-48ce-8939-ba6e0c947fb5.png" alt="Screenshot1" width="660" />

*Figure 1: `index.php`*

--- 
### Setting up
1. Importing the database from `db.sql`
1. Creating a file named `connection.back.php` in `/backend` folder with the code below: 

```php
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
```
