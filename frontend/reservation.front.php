<?php
    include '../includes/navbar.php';
    include '../backend/connection.back.php';
    include '../backend/reservation.back.php';

    $id = $_GET["id"];
    $_SESSION["location"] = $_GET["location"];
    $_SESSION["checkInDate"] = $_GET["checkInDate"];
    $_SESSION["checkOutDate"] = $_GET["checkOutDate"];

    echo $_SESSION["checkOutDate"];
    $reservation = new Reservation();
    $reservation->getPackageDetails($id,$checkInDate,$checkOutDate);

?>