<?php
    include '../includes/navbar.php';
    include '../backend/connection.back.php';
    include '../backend/reservation.back.php';

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION["location"] = $_GET["location"];
    $_SESSION["checkInDate"] = $_GET["checkInDate"];
    $_SESSION["checkOutDate"] = $_GET["checkOutDate"];

    $reservation = new Reservation();
    $reservation->setSearchDetails($_SESSION["location"], $_SESSION["checkInDate"], $_SESSION["checkOutDate"]);
    $reservation->getHotelDetails();
?>