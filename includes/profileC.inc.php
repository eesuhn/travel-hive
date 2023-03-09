<?php
include "../backend/connection.back.php";
include "../backend/account.back.php";
include "../backend/customer.back.php";

if (isset($_POST["submit"])){
    //Grabbing data
    $newName = $_POST["name"];
    $newEmail = $_POST["email"];
    $newAge = $_POST["age"];
    $newOrigin = $_POST["origin"];

    $change = new Customer();
    session_start();
    $change ->changeName($_SESSION["custUid"], $newName);
    echo "<script>alert('Changed Successfully'); window.location.href='../frontend/profileC.front.php'</script>";
    }
?>