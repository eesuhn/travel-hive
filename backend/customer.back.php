<?php
class Customer extends Account{
    protected $name;
    protected $age;
    protected $origin;

    //constructor method
    public function __construct(){
        parent::__construct();
        $this->name = "";
        $this->age = "";
        $this->origin = "";
    }
   
    //setting required attributes into object from form
    public function setRegisterDetails($name,$email,$pwd,$age,$origin){
        $this->name = $name;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->age = $age;
        $this->origin = $origin;    
    }

    //inserting details into database
    public function registerUser(){
        $sql = "INSERT INTO customer (custName, custEmail, custPwd, custAge, custPlace) VALUES (:value1, :value2, :value3, :value4, :value5)";

        $stmt = $this->connect()->prepare($sql);

        $stmt->bindParam(':value1', $value1);
        $stmt->bindParam(':value2', $value2);
        $stmt->bindParam(':value3', $value3);
        $stmt->bindParam(':value4', $value4);
        $stmt->bindParam(':value5', $value5);

        $value1 = $this->name;
        $value2 = $this->email;
        $value3 = $this->pwd;
        $value4 = $this->age;
        $value5 = $this->origin;

        if ($stmt->execute(array(':value1' => $value1, ':value2' => $value2, ':value3' => $value3, ':value4' => $value4, ':value5' => $value5))) {
        } else {
            $error = $stmt->errorInfo();
            echo "Error: " . $error[2];
        }        
    }
}