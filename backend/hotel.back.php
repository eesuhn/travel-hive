<?php

class Hotel extends Account{

    protected $hName;
    protected $hEmail;
    protected $hPwd;
    protected $hAdd;
    protected $hDesc;
    protected $imgPath;

    // constructor method
    public function __construct(){
        $this->hName="";
        parent::__construct();
        $this->hAdd = "";
        $this->hDesc = "";
        $this->imgPath = "";
    }
   
    //setting required attributes into object from form
    public function setHotelDetails($hName,$hEmail,$hPwd,$hAdd,$hDesc,$imgPath){
        $this->hName = $hName;
        $this->hEmail = $hEmail;
        $this->hPwd = $hPwd;
        $this->hAdd = $hAdd;
        $this->hDesc = $hDesc;
        $this->imgPath = $imgPath;    
    }

    //inserting details into database
    public function registerHotel(){

        $sql = "INSERT INTO hotel (hotelName, hotelEmail, hotelPwd, hotelAdd, hotelDesc, hotelImage) VALUES (:value1, :value2, :value3, :value4, :value5, :value6)";

        $stmt = $this->connect()->prepare($sql);

        $stmt->bindParam(':value1', $value1);
        $stmt->bindParam(':value2', $value2);
        $stmt->bindParam(':value3', $value3);
        $stmt->bindParam(':value4', $value4);
        $stmt->bindParam(':value5', $value5);
        $stmt->bindParam(':value6', $value6);

        $value1 = $this->hName;
        $value2 = $this->hEmail;
        $value3 = $this->hPwd;
        $value4 = $this->hAdd;
        $value5 = $this->hDesc;
        $value6 = $this->imgPath;

        if ($stmt->execute(array(':value1' => $value1, ':value2' => $value2, ':value3' => $value3, ':value4' => $value4, ':value5' => $value5, ':value6' => $value6))) {
            echo "<script>alert('Account successfully created'); window.location.href='../frontend/login.front.php'</script>";
        } else {
            $error = $stmt->errorInfo();
            echo "Error: " . $error[2];
        }        
    }

    // display hotel name based on user id
    public function showName($uid){
        $sql = "SELECT * FROM hotel where hotelUid = '$uid';";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            echo $row['hotelName'];
        }
    }

    // display hotel email based on user id
    public function showEmail($uid){
        $sql = "SELECT * FROM hotel where hotelUid = '$uid';";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            echo $row['hotelEmail'];
        }
    }

    // display hotel address based on user id
    public function showAdd($uid){
        $sql = "SELECT * FROM hotel where hotelUid = '$uid';";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            echo $row['hotelAdd'];
        }
    }

    // display hotel description based on user id
    public function showDesc($uid){
        $sql = "SELECT * FROM hotel where hotelUid = '$uid';";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            echo $row['hotelDesc'];
        }
    }

    // display hotel image based on user id
    public function showImage($uid){
        $sql = "SELECT * FROM hotel where hotelUid = '$uid';";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['hotelImage'];
        }else{
            return "Error, no image found in database";
        }
    }

    // update hotel name based on user id
    public function changeName($uid, $newName){
        $sql = "UPDATE hotel SET hotelName = '$newName' WHERE hotelUid = '$uid';";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }

    // update hotel email based on user id
    public function changeEmail($uid, $newEmail){
        $sql = "UPDATE hotel SET hotelEmail = '$newEmail' WHERE hotelUid = '$uid';";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }

    // update hotel pwd based on user id
    public function changePwd($uid, $newPwd){
        $sql = "UPDATE hotel SET hotelPwd = '$newPwd' WHERE hotelUid = '$uid';";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }

    // update hotel address based on user id
    public function changeAdd($uid, $newAdd){
        $sql = "UPDATE hotel SET hotelAdd = '$newAdd' WHERE hotelUid = '$uid';";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }

    // update hotel description based on user id
    public function changeDesc($uid, $newDesc){
        $sql = "UPDATE hotel SET hotelDesc = '$newDesc' WHERE hotelUid = '$uid';";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }

    // update hotel image based on user id
    public function changeImage($uid, $newImage){
        $sql = "UPDATE hotel SET hotelImage = '$newImage' WHERE hotelUid = '$uid';";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }
}