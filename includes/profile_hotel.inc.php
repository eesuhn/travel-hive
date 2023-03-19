<?php
    include "../backend/connection.back.php";
    include "../backend/account.back.php";
    include "../backend/hotel.back.php";

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $hotelUid = $_SESSION["hotelUid"];

    $hotel = new Hotel();
    $oldImg = $hotel->showImage($hotelUid);
    
    if (isset($_POST["submit"])){

        if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] === UPLOAD_ERR_OK) {

            unlink("$oldImg");

            $fileTmpPath = $_FILES['fileUpload']['tmp_name'];
            $fileName = $_FILES['fileUpload']['name'];
            $fileSize = $_FILES['fileUpload']['size'];
            $fileType = $_FILES['fileUpload']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');
            
            if (in_array($fileExtension, $allowedfileExtensions)) {
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                $uploadFileDir = "../uploads/";
                $dest_path = $uploadFileDir . $newFileName;
                move_uploaded_file($fileTmpPath, $dest_path);
                $filemsg="";
            }
            $newImg = $dest_path;

            $change = new Hotel();

            $change ->changeImage($_SESSION["hotelUid"], $newImg);

        }
        $newName = $_POST["name"];
        $newEmail = $_POST["email"];

        if (!empty($_POST["pwd"])) {
            $newPwd = $_POST["pwd"];

        } else {
            $newPwd = $hotel->getPwd($_SESSION["hotelUid"]);
        }

        $newAddress = $_POST["address"];
        $newDesc = $_POST["description"];

        $change = new Hotel();

        $change ->changeName($_SESSION["hotelUid"], $newName);
        $change ->changeEmail($_SESSION["hotelUid"], $newEmail);
        $change ->changePwd($_SESSION["hotelUid"], $newPwd);
        $change ->changeAdd($_SESSION["hotelUid"], $newAddress);
        $change ->changeDesc($_SESSION["hotelUid"], $newDesc);

        echo "
            <script>
                alert('Changed Successfully'); 
                window.location.href='../frontend/profile_hotel.front.php'
            </script>";
    }
?>