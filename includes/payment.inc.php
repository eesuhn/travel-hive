<?php
    include '../includes/navbar.php';
    include '../backend/connection.back.php';
    include '../backend/account.back.php';
    include '../backend/hotel.back.php';
    include '../backend/packages.back.php';
    include '../backend/payment.back.php';
    include '../backend/reservation.back.php';

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    $custUid = $_SESSION["custUid"];
    $checkIn = $_SESSION["checkInDate"];
    $checkOut = $_SESSION["checkOutDate"];
    
    $payment = new Payment();
    $reservation = new Reservation();
    
    if (isset($_POST["submit"])) {
        $packageId = $_SESSION["packId"];
        $price = $_SESSION["price"];

        if($_POST["submit"]=="pay-now") {
            $payment->payNow($price);
            $payment -> savePaymentDetails();

            $reservation->setReservationDetails($checkIn, $checkOut, $custUid, $packageId);
            $reservation->registerReservation();

            echo 
            "<script>alert('Thank You For Your Payment!');
            window.location.href='../frontend/paid_online.front.php'</script>";

        } else if ($_POST["submit"]=="pay-later") {
            $payment->payLater($price);
            $payment -> savePaymentDetails();

            $reservation->setReservationDetails($checkIn, $checkOut, $custUid, $packageId);
            $reservation->registerReservation();

            echo 
            "<script>alert('Please Pay at the Hotel Counter Before Check-In.');
            window.location.href='../frontend/pay_later.front.php'</script>";
        }
    }
?>