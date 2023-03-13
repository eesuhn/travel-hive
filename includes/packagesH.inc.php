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

    if (isset($_POST['submit'])) {
        $packageID = $_POST['packageID'];
        $packageName = $_POST['name'];
        $packagePrice = $_POST['price'];
        $packageDesc = $_POST['description'];

        $packages->changeName($packageID, $packageName);
        $packages->changePrice($packageID, $packagePrice);
        $packages->changeDesc($packageID, $packageDesc);

        echo "
            <script>
                alert('Changed Successfully'); 
                window.location.href='../frontend/packagesH.front.php'
            </script>";
    }
?>