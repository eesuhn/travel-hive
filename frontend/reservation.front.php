<?php
    include '../includes/navbar.php';
    include '../backend/connection.back.php';
    include '../backend/reservation.back.php';

    $_SESSION["hotelId"] = $_GET["hotelId"];

    $reservation = new Reservation();
    $reservation->getPackageDetails($_SESSION["hotelId"], $_SESSION["checkInDate"], $_SESSION["checkOutDate"]);
?>