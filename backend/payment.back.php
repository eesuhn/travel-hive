<?php

define('BOOKINGFEE',100);

class Payment extends Database{
    private $refNo;
    private $unitPrice;
    private $unitsOfRoom;
    private $finalPrice;
    private $payMethod;
    private $payStatus;

    public function __construct() {
        $this->refNo = "";
        $this->unitPrice = "";
        $this->unitsOfRoom = "";
        $this->finalPrice = "";
        $this->payMethod = "";
        $this->payStatus = "";
    }

    public function getBookingFee(){
        return BOOKINGFEE;
    }

    public function getFinalPrice(){
        $this->finalPrice = (double)$this->unitPrice * (int)$this->unitsOfRoom + BOOKINGFEE;
        return $this->finalPrice;
    }

    public function savePaymentDetails($custUid){
        $sql = "INSERT INTO payment (finalPrice, payMethod, payStatus) VALUES (:value1, :value2, :value3)";
        $stmt = $this->connect()->prepare($sql);

        $stmt->bindParam(':value1', $value1);
        $stmt->bindParam(':value2', $value2);
        $stmt->bindParam(':value3', $value3);

        $value1 = $this->finalPrice;
        $value2 = $this->payMethod;
        $value3 = $this->payStatus;

        if ($stmt->execute(array(':value1' => $value1, ':value2' => $value2, ':value3' => $value3))) {
            echo "<script>alert('Package successfully created'); window.location.href='../frontend/packagesH.front.php'</script>";
        } else {
            $error = $stmt->errorInfo();
            echo "Error: " . $error[2];
        }
    }

    public function payNow(){
        $this->payMethod = "Online Payment";
        $this->payStatus = "Paid";
    }
    
    public function payLater(){
        $this->payMethod = "Physical Payment";
        $this->payStatus = "Unpaid";
    }
    
    public function getPayMethod(){
        echo "<script>alert(`$this->payMethod`)</script>";
        return $this->payMethod;
    }

    public function numOfDays($checkInDate,$checkOutDate){
        //count the number of days between check in and check out date  
        $date1 = strtotime($checkInDate);
        $date2 = strtotime($checkOutDate);
        $diff = abs($date2 - $date1);
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        return $days;
    }
}

?>