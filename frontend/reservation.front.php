<?php
    include '../includes/navbar.php';
    include '../backend/connection.back.php';
    include '../backend/reservation.back.php';

    $location = $_GET["location"];
    $checkInDate = $_GET["inDate"];
    $checkOutDate = $_GET["outDate"];
    $id = $_GET["id"];

    $reservation = new Reservation();
    $reservation->getPackageDetails($id);

?>


