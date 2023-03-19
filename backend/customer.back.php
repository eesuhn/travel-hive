<?php
    class Customer extends Account{
        protected $name;
        protected $email;
        protected $pwd;
        protected $age;
        protected $origin;
        protected $gender;

        public function __construct() {
            $this->name = "";
            parent::__construct();
            $this->age = "";
            $this->origin = "";
            $this->gender = "";
        }

        public function setCustDetails($name, $email, $pwd, $age, $origin, $gender) {
            $this->name = $name;
            $this->email = $email;
            $this->pwd = $pwd;
            $this->age = $age;
            $this->origin = $origin;
            $this->gender = $gender;
        }

        public function registerCustomer() {
            $sql = 
            "INSERT INTO customer (custName, custEmail, custPwd, custAge, custPlace, custGender) 
            VALUES (:value1, :value2, :value3, :value4, :value5, :value6)";

            $stmt = $this->connect()->prepare($sql);

            $stmt->bindParam(':value1', $value1);
            $stmt->bindParam(':value2', $value2);
            $stmt->bindParam(':value3', $value3);
            $stmt->bindParam(':value4', $value4);
            $stmt->bindParam(':value5', $value5);
            $stmt->bindParam(':value6', $value6);

            $value1 = $this->name;
            $value2 = $this->email;
            $value3 = $this->pwd;
            $value4 = $this->age;
            $value5 = $this->origin;
            $value6 = $this->gender;

            if ($stmt->execute(
                array(':value1' => $value1, ':value2' => $value2, ':value3' => $value3, 
                ':value4' => $value4, ':value5' => $value5, ':value6' => $value6))) {
                
                echo 
                "<script>alert('Account successfully created'); 
                window.location.href='../frontend/login.front.php'</script>";

            } else {
                $error = $stmt->errorInfo();
                echo "Error: " . $error[2];
            }
        }
        

        public function updateCustDetails($uid, $newName, $newEmail, $newPwd, $newAge, $newOrigin, $newGender) {
            $newPwd = $newPwd;

            $sql = 
            "UPDATE customer SET custName = '$newName', custEmail = '$newEmail', custPwd = '$newPwd', 
            custAge = '$newAge', custPlace = '$newOrigin', custGender = '$newGender' WHERE custUid='$uid';";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
        }


        public function showName($uid) {
            $sql = "SELECT * FROM customer where custUid = '$uid';";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row["custName"];
            }
        }

        public function showEmail($uid) {
            $sql = "SELECT * FROM customer where custUid = '$uid';";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row["custEmail"];
            }
        }
        public function showAge($uid) {
            $sql = "SELECT * FROM customer where custUid = '$uid';";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row["custAge"];
            }
        }
        public function showOrigin($uid) {
            $sql = "SELECT * FROM customer where custUid = '$uid';";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row["custPlace"];
            }
        }
        public function showGender($uid) {
            $sql = "SELECT * FROM customer where custUid = '$uid';";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row["custGender"] == 'M') {
                    return "Male";
                } else {
                    return "Female";
                }
            }
        }

        public function getPwd ($uid) {
            $sql = "SELECT * FROM customer where custUid = '$uid';";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row["custPwd"];
            }
        }
    }
?>