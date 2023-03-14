<?php
include "../backend/connection.back.php";
include "../backend/account.back.php";
include "../backend/customer.back.php";
session_start();
$custId = $_SESSION["custUid"];

if (isset($_POST["submit"])){
    //Grabbing data
    $newName = $_POST["name"];
    $newEmail = $_POST["email"];
    $newPwd = $_POST["pwd"];
    $newAge = $_POST["age"];
    $newOrigin = $_POST["origin"];
    $newGender = $_POST["gender"];

    $change = new Customer();
    $change ->updateCustDetails($custId, $newName,$newEmail,$newPwd,$newAge,$newOrigin,$newGender);
    echo "<script>alert('Changed Successfully'); window.location.href='../frontend/profileC.front.php'</script>";
    }
?>