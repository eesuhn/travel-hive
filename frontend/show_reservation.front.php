<?php
    include '../includes/navbar.php';
    include '../backend/connection.back.php';
    include '../backend/reservation.back.php';

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $showReservations = new Reservation();
    $showReservations->showReservations($_SESSION["custUid"]);
?>