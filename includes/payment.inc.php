<?php
    include '../includes/navbar.php';
    include '../backend/connection.back.php';
    include '../backend/account.back.php';
    include '../backend/hotel.back.php';
    include '../backend/packages.back.php';
    include '../backend/payment.back.php';
    include '../backend/reservation.back.php';

    // start session if not started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    $custUid = $_SESSION["custUid"];
    $packageId = $_SESSION["packId"];
    $checkIn = $_SESSION["checkInDate"];
    $checkOut = $_SESSION["checkOutDate"];

    $payment = new Payment();
    $reservation = new Reservation();

    if (isset($_POST["submit"])){
        $price = $_SESSION["price"];

        // if user chose to pay now, save payment details and redirect to paidOnline.front.php
        if($_POST["submit"]=="pay-now") {
            $payment->payNow($price);
            $payment -> savePaymentDetails($custUid);

            $reservation->setReservationDetails($checkIn, $checkOut, $custUid, $packageId);
            $reservation->registerReservation();

            echo 
            "<script>alert('Thank You For Your Payment!');
            window.location.href='../frontend/paidOnline.front.php'</script>";
        }

        // if user chose to pay later, save payment details and redirect to payLater.front.php
        else if ($_POST["submit"]=="pay-later") {
            $payment->payLater($price);
            $payment -> savePaymentDetails($custUid);

            $reservation->setReservationDetails($checkIn, $checkOut, $custUid, $packageId);
            $reservation->registerReservation();

            echo 
            "<script>alert('Please Pay at the Hotel Counter Before Check-In.');
            window.location.href='../frontend/payLater.front.php'</script>";
        }
    }
?>