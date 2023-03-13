<?php
    include '../backend/connection.back.php';
    include "../backend/account.back.php";
    include "../backend/hotel.back.php";
    include '../backend/packages.back.php';

    // if session is not started, start it
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $hotelUid = $_SESSION["hotelUid"];

    $hotel = new Hotel();
    $packages = new Packages();

    $oldImg = $packages->showImage($hotelUid);

    if (isset($_POST['submit'])) {

        $packageID = $_POST['packageID'];

        if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] === UPLOAD_ERR_OK) {
            // delete old image
            unlink("$oldImg");

            // get details of the uploaded file
            $fileTmpPath = $_FILES['fileUpload']['tmp_name'];
            $fileName = $_FILES['fileUpload']['name'];
            $fileSize = $_FILES['fileUpload']['size'];
            $fileType = $_FILES['fileUpload']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');
            
            // check if file is inside the array of supported files
            if (in_array($fileExtension, $allowedfileExtensions)) {
                //sanitize file-name
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                $uploadFileDir = "../uploads/";
                $dest_path = $uploadFileDir . $newFileName;
                move_uploaded_file($fileTmpPath, $dest_path);
                $filemsg="";
            }
            $newImg = $dest_path;

            // grabbing data
            $change = new Packages();

            // call method to update hotel details
            $change ->changeImage($packageID, $newImg);

        }
        
        $packageName = $_POST['name'];
        $packagePrice = $_POST['price'];
        $packageDesc = $_POST['description'];

        $packages->changeName($packageID, $packageName);
        $packages->changePrice($packageID, $packagePrice);
        $packages->changeDesc($packageID, $packageDesc);

        echo "
            <script>
                alert('Changed Successfully'); 
                window.location.href='../frontend/packagesH.front.php'
            </script>";
    }
?>