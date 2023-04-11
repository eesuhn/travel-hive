## Travel Hive
An **online hotel booking system** that offers a professional and seamless experience for tourists.

- **Customer** user to book hotels based on: 
  - Package availability 
  - Location 
- **Hotel** user to manage: 
  - Reservations 
  - Packages and corresponding rooms 
 ---

<img src="https://user-images.githubusercontent.com/102596628/226254835-1fbf3033-1cd9-48ce-8939-ba6e0c947fb5.png" alt="Screenshot1" width="660" />

*Figure 1: `index.php`*

--- 
### Setting up
1. Create database named `travelhive`, and import `db.sql`
2. Create a file named `connection.back.php` in `/backend` folder with the code below: 

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
