<!DOCTYPE html>
<html>



<?php
    include '../includes/navbar.php';  
    include '../backend/connection.back.php';
    include '../backend/reservation.back.php';

    $location = $_GET["location"];
    $checkInDate = $_GET["inDate"];
    $checkOutDate = $_GET["outDate"];

    $_SESSION["loc"] = $location;
    $_SESSION["iDate"] = $checkInDate;
    $_SESSION["oDate"] = $checkOutDate;

    $reservation = new Reservation();
    $reservation->setReservationDetails($location,$checkInDate,$checkOutDate);
    $reservation->getHotelDetails();
?>