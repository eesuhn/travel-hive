<?php
    class Account extends Database{
        
        protected $email;
        protected $pwd;

        public function __construct() {
            $this->email = "";
            $this->pwd = "";
        }
        
        public function setLoginDetails($email,$pwd) {
            $this->email = $email;
            $this->pwd = $pwd;
        }

        public function loginCustomer() {
            $pwd = $this->pwd;

            $sql = "SELECT * FROM `customer` WHERE `custEmail` = :email AND `custPwd` = :pwd";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(array(':email' => $this->email, ':pwd' => $pwd));

            if ($stmt->rowCount()>0){
                $row=$stmt->fetch(PDO::FETCH_ASSOC);

                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                $_SESSION["accountType"] = "customer";
                $_SESSION["custUid"] = $row["custUid"];

                echo 
                "<script>alert('You are now logged in'); 
                window.location.href='../index/index.php'</script>";

            } else {
                echo 
                "<script>alert('No account found'); 
                window.location.href='../frontend/login.front.php'</script>";
            }
        }

        public function loginHotel() {
            $pwd = $this->pwd;

            $sql = "SELECT * FROM `hotel` WHERE `hotelEmail` = :email AND `hotelPwd` = :pwd";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(array(':email' => $this->email, ':pwd' => $pwd));

            if ($stmt->rowCount()>0){
                $row=$stmt->fetch(PDO::FETCH_ASSOC);

                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                $_SESSION["accountType"] = "hotel";
                $_SESSION["hotelUid"] = $row["hotelUid"];
                $_SESSION["hotelName"] = $row["hotelName"];

                echo 
                "<script>alert('You are now logged in'); 
                window.location.href='../frontend/dashboard_hotel.front.php'</script>";

            } else {
                echo 
                "<script>alert('No account found'); 
                window.location.href='../frontend/login.front.php'</script>";
            }
        }
    }
?>