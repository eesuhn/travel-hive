<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="../style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta charset="utf-8">
  <title>Travel Hive | Your One Stop Platform for Awesome Travels</title>
</head>
<?php
//Check session
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (session_status() == PHP_SESSION_ACTIVE && empty($_SESSION["accountType"])) {
?>
  <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light px-2">
    <a class="navbar-brand" href="../index/index.php">
      <img src="../includes/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      TRAVEL HIVE
    </a>
    <div class="navbar">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="../index/index.php">Home</a>
        <a class="nav-item nav-link" href="../frontend/login.front.php">Login</a>
      </div>
    </div>
  </nav>
<?php
} else if (session_status() == PHP_SESSION_ACTIVE && ($_SESSION["accountType"] === "customer")) {
?>
  <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light px-2">
    <a class="navbar-brand" href="../index/index.php">
      <img src="../includes/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      TRAVEL HIVE
    </a>
    <div class="navbar">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="../index/index.php">Home</a>
        <a class="nav-item nav-link" href="../frontend/showReservation.front.php">Resrvations</a>
        <a class="nav-item nav-link" href="../frontend/profileC.front.php">Profile</a>
        <a class="nav-item nav-link" href="../includes/logout.inc.php">Logout</a>
      </div>
    </div>
  </nav>
<?php

} else if (session_status() == PHP_SESSION_ACTIVE && ($_SESSION["accountType"] === "hotel")) {

?>
  <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light px-2">
    <a class="navbar-brand" href="../index/index.php">
      <img src="../includes/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      TRAVEL HIVE
    </a>
    <div class="navbar">
      <div class="navbar-nav">

        <!--  
          redirect to dashboard which show: 
            - update profile
            - update packages
            - maintain bookings
        -->
        <a class="nav-item nav-link" href="../frontend/dashboard_hotel.front.php">Dashboard</a>

        <!-- redirect to booking page to book for customers -->
        <a class="nav-item nav-link" href="../frontend/booking.front.php">Bookings</a>

        <a class="nav-item nav-link" href="../includes/logout.inc.php">Logout</a>
      </div>
    </div>
  </nav>

<?php
}
?>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</html>