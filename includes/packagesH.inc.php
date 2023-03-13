<?php
    include '../backend/connection.back.php';
    include "../backend/account.back.php";
    include "../backend/hotel.back.php";
    include '../backend/packages.back.php';

    // if session is not started, start it
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $hotelUid = $_SESSION["hotelUid"];

    $hotel = new Hotel();
    $packages = new Packages();
?>