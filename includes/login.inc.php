<?php
    if (isset($_POST["submit"])) {

        $email = $_POST["email"];
        $pwd = $_POST["pwd"];

        include "../backend/connection.back.php";
        include "../backend/account.back.php";

        $login = new Account();
        $login->setLoginDetails($email,$pwd);

        if ($_POST["accType"]==="customer") {
            $login->loginCustomer();
            
        } else {
            $login->loginHotel();
        }
    }
?>