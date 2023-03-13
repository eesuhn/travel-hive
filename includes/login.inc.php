<?php
    if (isset($_POST["submit"])) {

        //Grabbing data
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];

        //Instantiate what is needed
        include "../backend/connection.back.php";
        include "../backend/account.back.php";

        //Function to check user
        $login = new Account();
        $login->setLoginDetails($email,$pwd);

        if ($_POST["accType"]==="customer") {
            $login->loginUser();
        } else {
            $login->loginHotel();
        }

        /* 
            redirect to 
                home page if customer login
                dashboard if hotel login
        */
        if ($_POST["accType"]==="customer") {
            header("Location: ../index/index.php");
        } else {
            header("Location: ../frontend/dashboard_hotel.front.php");
        }
    }
?>