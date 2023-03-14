<?php
include "../backend/connection.back.php";
include "../backend/payment.back.php";

if (isset($_POST["submit"])){
    //Grabbing data
    $payMethod = new Payment();
    if($_POST["submit"]=="pay-now"){
        $payMethod->payNow();
        echo "<script>alert('Thank You For Your Payment!')</script>";
        echo "<script>window.location.href='../frontend/paidOnline.front.php'</script>";
    }
    else{
        $payMethod->payLater();
        echo "<script>alert('Please Pay at the Hotel Counter Before Check-In.')</script>";
        echo "<script>window.location.href='../frontend/payLater.front.php'</script>";
    }
}
?>