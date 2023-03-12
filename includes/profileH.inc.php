<?php
    include "../backend/connection.back.php";
    include "../backend/account.back.php";
    include "../backend/hotel.back.php";

    if (isset($_POST["submit"])){


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
        // grabbing data
        $newName = $_POST["name"];
        $newEmail = $_POST["email"];
        $newAddress = $_POST["address"];
        $newDesc = $_POST["description"];
        $imgPath = $dest_path;

        $change = new Hotel();
        session_start();

        // call method to update hotel details
        $change ->changeName($_SESSION["hotelUid"], $newName);
        $change ->changeEmail($_SESSION["hotelUid"], $newEmail);
        $change ->changeAdd($_SESSION["hotelUid"], $newAddress);
        $change ->changeDesc($_SESSION["hotelUid"], $newDesc);
        $change ->changeImage($_SESSION["hotelUid"], $imgPath);

        echo "
            <script>
                alert('Changed Successfully'); 
                window.location.href='../frontend/profileH.front.php'
            </script>";
    }
?>