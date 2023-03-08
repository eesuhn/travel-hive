<?php

if (isset($_POST["submit"])){

    //Grabbing data
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    //Instantiate what is needed
    include "../backend/connection.back.php";
    include "../backend/login.back.php";

    //Function to check user
    $login = new Login();
    $login->setLoginDetails($email,$pwd);

    if ($_POST["accType"]==="customer"){
    $login->loginUser();
    }else{
    $login->loginHotel();
    }
}
