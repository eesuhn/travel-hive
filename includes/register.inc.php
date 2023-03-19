<?php

    include "../backend/connection.back.php";
    include "../backend/account.back.php";
    include "../backend/hotel.back.php";
    include "../backend/customer.back.php";

    if (isset($_POST["submitU"])) {

        $name = $_POST["name"];
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
        $age = (int)$_POST["age"];
        $origin = $_POST["origin"];
        $gender = $_POST["gender"];

        $customer = new Customer();
        $customer->setCustDetails($name, $email, $pwd, $age, $origin, $gender);
        $customer->registerCustomer();
    }

    if (isset($_POST["submitH"])) {

        if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['fileUpload']['tmp_name'];
            $fileName = $_FILES['fileUpload']['name'];
            $fileSize = $_FILES['fileUpload']['size'];
            $fileType = $_FILES['fileUpload']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');

            if (in_array($fileExtension, $allowedfileExtensions)){
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                $uploadFileDir = "../uploads/";
                $dest_path = $uploadFileDir . $newFileName;
                move_uploaded_file($fileTmpPath, $dest_path);
                $filemsg="";
            }
        }
        $hName=$_POST["hName"];
        $hEmail = $_POST["hEmail"];
        $hPwd = $_POST["hPwd"];
        $hAdd = $_POST["hAdd"];
        $hDesc = $_POST["hDesc"];
        $imgPath = $dest_path;
        
        $hotel = new Hotel();

        $hotel->setHotelDetails($hName, $hEmail, $hPwd, $hAdd, $hDesc, $imgPath);
        $hotel->registerHotel();
    }
?>