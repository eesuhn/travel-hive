<?php

//instantiate what is needed
include "../backend/connection.back.php";
include "../backend/account.back.php";
include "../backend/hotel.back.php";
include "../backend/customer.back.php";

if (isset($_POST["submitU"])){

    //grabbing data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $age = (int)$_POST["age"];
    $origin = $_POST["origin"];
    $gender = $_POST["gender"];

    //constructor methods and required functions
    $customer = new Customer();
    $customer->setRegisterDetails($name,$email,$pwd,$age,$origin,$gender);
    $customer->registerCustomer();
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
    
    //constructor methods and required functions
    $hotel = new Hotel();
    $hotel->setHotelDetails($hName,$hEmail,$hPwd,$hAdd,$hDesc,$imgPath);
    $hotel->registerHotel();

}
