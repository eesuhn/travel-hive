<?php

    include '../backend/connection.back.php';
    include '../backend/reservation.back.php';

    $reservation = new Reservation();
    $reservation->cancelReservation($_GET["resId"]);

?>