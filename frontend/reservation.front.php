<?php
    include '../includes/navbar.php';
    include '../backend/connection.back.php';
    include '../backend/reservation.back.php';

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION["hotelId"] = $_GET["hotelId"];

    $reservation = new Reservation();

    if (isset($_SESSION["accountType"])) {
        $reservation->getPackageDetails($_SESSION["hotelId"], $_SESSION["checkInDate"], $_SESSION["checkOutDate"]);

    } else {
        echo 
        "<script>alert('Please login to continue.'); 
        window.location.href='../frontend/login.front.php'</script>";
    }
?>