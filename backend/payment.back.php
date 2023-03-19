<?php
    class Payment extends Database{
        private const BOOKINGFEE = 100;
        private $finalPrice;
        private $payMethod;
        private $payStatus;
        private $nights;

        public function __construct() {
            $this->finalPrice = "";
            $this->payMethod = "";
            $this->payStatus = "";
            $this->nights = "";
        }

        public function getBookingFee() {
            return sprintf("%0.2f", self::BOOKINGFEE);
        }

        public function getSubtotal($unitPrice) {
            return sprintf("%0.2f",$unitPrice * $this->nights);
        }

        public function getFinalPrice($unitPrice){
            $this->finalPrice = $unitPrice * $this->nights + self::BOOKINGFEE;
            return sprintf("%0.2f",$this->finalPrice);
        }

        public function payNow($price){
            $this->payMethod = "Online Payment";
            $this->payStatus = "Paid";
            $this->finalPrice = $price;
        }
        
        public function payLater($price){
            $this->payMethod = "Physical Payment";
            $this->payStatus = "Unpaid";
            $this->finalPrice = $price;
        }
        
        public function numOfNights($checkInDate,$checkOutDate){
            $date1 = strtotime($checkInDate);
            $date2 = strtotime($checkOutDate);
            $diff = abs($date2 - $date1);
            $years = floor($diff / (365*60*60*24));
            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
            $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
            $this->nights = $years * 365 + $months * 30 + $days;
            return $this->nights;
        }

        public function savePaymentDetails(){
            $sql = 
            "INSERT INTO payment (finalPrice, payMethod, payStatus) 
            VALUES (:value1, :value2, :value3)";
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
?>