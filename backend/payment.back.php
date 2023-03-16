<?php

//declare and initialise constant variable BOOKINGFEE to 100.00
define('BOOKINGFEE',sprintf("%0.2f",100));

class Payment extends Database{
    private $finalPrice;
    private $payMethod;
    private $payStatus;
    private $nights;

    //default constructor
    public function __construct() {
        $this->finalPrice = "";
        $this->payMethod = "";
        $this->payStatus = "";
        $this->nights = "";
    }

    //display booking fee
    public function getBookingFee(){
        return BOOKINGFEE;
    }

    //calculate subtotal based on the number of nights and price per package
    public function getSubtotal($unitPrice){
        return sprintf("%0.2f",$unitPrice * $this->nights);
    }

    //calculate final price to be paid by adding booking fee to subtotal
    public function getFinalPrice($unitPrice){
        $this->finalPrice = $unitPrice * $this->nights + BOOKINGFEE;
        return sprintf("%0.2f",$this->finalPrice);
    }

    //set payment method to online payment and payment status to paid
    public function payNow($price){
        $this->payMethod = "Online Payment";
        $this->payStatus = "Paid";
        $this->finalPrice = $price;
    }
    
    //set payment method to physical payment and payment status to unpaid
    public function payLater($price){
        $this->payMethod = "Physical Payment";
        $this->payStatus = "Unpaid";
        $this->finalPrice = $price;
    }
    
    //count the number of nights between check in and check out date
    public function numOfNights($checkInDate,$checkOutDate){
        $date1 = strtotime($checkInDate);
        $date2 = strtotime($checkOutDate);
        $diff = abs($date2 - $date1);
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $this->nights = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        return $this->nights;
    }

    //insert payment details to database
    public function savePaymentDetails($custUid){
        $sql = "INSERT INTO payment (finalPrice, payMethod, payStatus) VALUES (:value1, :value2, :value3)";
        $stmt = $this->connect()->prepare($sql);
    
        $stmt->bindParam(':value1', $value1);
        $stmt->bindParam(':value2', $value2);
        $stmt->bindParam(':value3', $value3);
    
        $value1 = $this->finalPrice;
        $value2 = $this->payMethod;
        $value3 = $this->payStatus;
    
        $stmt->execute(array(':value1' => $value1, ':value2' => $value2, ':value3' => $value3));
    }
}
