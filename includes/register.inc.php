<?php

if (isset($_POST["submitU"])){

    //Grabbing data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $age = (int)$_POST["age"];
    $origin = $_POST["origin"];


    //Instantiate what is needed
    include "../backend/connection.back.php";
    include "../backend/register.back.php";

    $registerU = new RegisterU();
    $registerU->setRegisterDetails($name,$email,$pwd,$age,$origin);
    $registerU->registerUser();

    

}

if (isset($_POST["submitH"])){
    //moving image to destination
    if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] === UPLOAD_ERR_OK){
        // get details of the uploaded file
        $fileTmpPath = $_FILES['fileUpload']['tmp_name'];
        $fileName = $_FILES['fileUpload']['name'];
        $fileSize = $_FILES['fileUpload']['size'];
        $fileType = $_FILES['fileUpload']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');
        //check if file is inside the array of supported files
        if (in_array($fileExtension, $allowedfileExtensions)){
            //sanitize file-name
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $uploadFileDir = "../uploads/";
            $dest_path = $uploadFileDir . $newFileName;
            move_uploaded_file($fileTmpPath, $dest_path);
            $filemsg="";
        }
    }
    //grabbing data
    $hName=$_POST["hName"];
    $hEmail = $_POST["hEmail"];
    $hPwd = $_POST["hPwd"];
    $hAdd = $_POST["hAdd"];
    $hDesc = $_POST["hDesc"];
    $imgPath = $dest_path;

    //Instantiate what is needed
    include "../backend/connection.back.php";
    include "../backend/register.back.php";
    
    $registerH = new RegisterH();
    $registerH->setHotelDetails($hName,$hEmail,$hPwd,$hAdd,$hDesc,$imgPath);
    $registerH->registerHotel();

}
