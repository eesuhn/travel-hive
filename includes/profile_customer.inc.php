<?php
    include "../backend/connection.back.php";
    include "../backend/account.back.php";
    include "../backend/customer.back.php";

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $custId = $_SESSION["custUid"];
    $cust = new Customer();

    if (isset($_POST["submit"])) {
        $newName = $_POST["name"];
        $newEmail = $_POST["email"];

        $customer = new Customer();

        if (!empty($_POST["pwd"])){
            $newPwd = $_POST["pwd"];

        } else {
            $newPwd = $customer->getPwd($_SESSION["custUid"]);
        }

        $newAge = $_POST["age"];
        $newOrigin = $_POST["origin"];

        if (!empty($_POST['gender'])) {
            $newGender = $_POST['gender'];

        } else {
            $newGender = $customer->showGender($_SESSION["custUid"]);
        }

        $change = new Customer();
        $change ->updateCustDetails($custId, $newName, $newEmail, $newPwd, $newAge, $newOrigin, $newGender);

        echo 
        "<script>alert('Changed Successfully'); 
        window.location.href='../frontend/profile_customer.front.php'</script>";
    }
?>