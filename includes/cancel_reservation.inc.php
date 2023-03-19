<?php
    include '../backend/connection.back.php';
    include '../backend/reservation.back.php';

    $resId = $_GET["id"];

    $res = new Reservation;
    $res->cancelReservation($resId);
?>