<?php
    include "../backend/connection.back.php";
    include "../backend/account.back.php";
    include "../backend/hotel.back.php";

    if (isset($_POST["submit"])){
        // grabbing data
        $newName = $_POST["name"];
        $newEmail = $_POST["email"];
        $newAddress = $_POST["address"];
        $newDesc = $_POST["description"];

        $change = new Hotel();
        session_start();

        // call method to update hotel details
        $change ->changeName($_SESSION["hotelUid"], $newName);
        $change ->changeEmail($_SESSION["hotelUid"], $newEmail);
        $change ->changeAdd($_SESSION["hotelUid"], $newAddress);
        $change ->changeDesc($_SESSION["hotelUid"], $newDesc);

        echo "<script>alert('Changed Successfully'); window.location.href='../frontend/profileH.front.php'</script>";
    }
?>