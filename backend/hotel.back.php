<?php

class Hotel extends Account{

    protected $hName;
    protected $hEmail;
    protected $hPwd;
    protected $hAdd;
    protected $hDesc;
    protected $imgPath;

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
        } else {
            $error = $stmt->errorInfo();
            echo "Error: " . $error[2];
        }        
    }
}