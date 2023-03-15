<!DOCTYPE html>
<html>

<?php
    include '../includes/navbar.php';  
    include '../backend/connection.back.php';
    include '../backend/reservation.back.php';
    
    $_SESSION["location"] = $_GET["location"];
    $_SESSION["checkInDate"] = $_GET["checkInDate"];
    $_SESSION["checkOutDate"] = $_GET["checkOutDate"];

    $reservation = new Reservation();
    $reservation->setReservationDetails($location,$checkInDate,$checkOutDate);
    $reservation->getHotelDetails();
?>