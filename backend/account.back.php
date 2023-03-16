<?php
class Account extends Database{
    protected $email;
    protected $pwd;

    public function __construct(){
        $this->email="";
        $this->pwd="";
    }
    public function setLoginDetails($email,$pwd){
        $this->email=$email;
        $this->pwd=$pwd;
    }
    public function loginUser(){
        $sql = "SELECT * FROM `customer` WHERE `custEmail` = :email AND `custPwd` = :pwd";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(array(':email' => $this->email, ':pwd' => $this->pwd));
        if ($stmt->rowCount()>0){
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["accountType"] = "customer";
            $_SESSION["custUid"] = $row["custUid"];
            echo "<script>alert('You are now logged in'); window.location.href='../index/index.php'</script>";
        }else{
            echo "<script>alert('No account found'); window.location.href='../frontend/login.front.php'</script>";
        }
    }
    public function loginHotel(){
        $sql = "SELECT * FROM `hotel` WHERE `hotelEmail` = :email AND `hotelPwd` = :pwd";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(array(':email' => $this->email, ':pwd' => $this->pwd));
        if ($stmt->rowCount()>0){
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["accountType"] = "hotel";
            $_SESSION["hotelUid"] = $row["hotelUid"];
            $_SESSION["hotelName"] = $row["hotelName"];
            echo "<script>alert('You are now logged in'); window.location.href='../frontend/dashboard_hotel.front.php'</script>";
        }else{
            echo "<script>alert('No account found'); window.location.href='../frontend/login.front.php'</script>";
        }
    }
}
?>