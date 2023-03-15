<?php
class Customer extends Account
{
    protected $name;
    protected $age;
    protected $origin;
    protected $pwd;
    protected $gender;

    //constructor method
    public function __construct()
    {
        parent::__construct();
        $this->name = "";
        $this->age = "";
        $this->origin = "";
        $this->pwd = "";
        $this->gender = "";
    }

    //setting required attributes into object from form
    public function setCustDetails($name, $email, $pwd, $age, $origin, $gender)
    {
        $this->name = $name;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->age = $age;
        $this->origin = $origin;
        $this->gender = $gender;
    }

    //inserting details into database
    public function registerCustomer()
    {
        $sql = "INSERT INTO customer (custName, custEmail, custPwd, custAge, custPlace, custGender) VALUES (:value1, :value2, :value3, :value4, :value5, :value6)";

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

        if ($stmt->execute(array(':value1' => $value1, ':value2' => $value2, ':value3' => $value3, ':value4' => $value4, ':value5' => $value5, ':value6' => $value6))) {
            echo "<script>alert('Account successfully created'); window.location.href='../frontend/login.front.php'</script>";
        } else {
            $error = $stmt->errorInfo();
            echo "Error: " . $error[2];
        }
    }
    

    public function updateCustDetails($uid, $newName, $newEmail, $newPwd, $newAge, $newOrigin, $newGender)
    {
        $sql = "UPDATE customer SET custName = '$newName', custEmail = '$newEmail', custPwd = '$newPwd', custAge = '$newAge', custPlace = '$newOrigin', custGender = '$newGender' WHERE custUid='$uid';";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }


    public function showName($uid)
    {
        $sql = "SELECT * FROM customer where custUid = '$uid';";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row["custName"];
        }
    }
    public function showEmail($uid)
    {
        $sql = "SELECT * FROM customer where custUid = '$uid';";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row["custEmail"];
        }
    }
    public function showAge($uid)
    {
        $sql = "SELECT * FROM customer where custUid = '$uid';";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row["custAge"];
        }
    }
    public function showOrigin($uid)
    {
        $sql = "SELECT * FROM customer where custUid = '$uid';";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row["custPlace"];
        }
    }
    public function showGender($uid)
    {
        $sql = "SELECT * FROM customer where custUid = '$uid';";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row["custGender"];
        }
    }

    // return password based on user id
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