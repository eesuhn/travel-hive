<?php
include '../includes/navbar.php';
include '../backend/connection.back.php';
include '../backend/account.back.php';
include '../backend/hotel.back.php';
include '../backend/packages.back.php';
include '../backend/payment.back.php';
$custUid = $_SESSION["custUid"];
$payment = new Payment();

if (isset($_POST["submit"])){
    $price = $_SESSION["price"];
    // if user chose to pay now, save payment details and redirect to paidOnline.front.php
    if($_POST["submit"]=="pay-now"){
        $payment->payNow($price);
        $payment -> savePaymentDetails($custUid);
        echo "<script>alert('Thank You For Your Payment!')</script>";
        echo "<script>window.location.href='../frontend/paidOnline.front.php'</script>";
    }
    // if user chose to pay later, save payment details and redirect to payLater.front.php
    else{
        $payment->payLater($price);
        $payment -> savePaymentDetails($custUid);
        echo "<script>alert('Please Pay at the Hotel Counter Before Check-In.')</script>";
        echo "<script>window.location.href='../frontend/payLater.front.php'</script>";
    }
}
