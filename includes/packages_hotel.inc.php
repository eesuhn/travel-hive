<?php
    include '../backend/connection.back.php';
    include "../backend/account.back.php";
    include "../backend/hotel.back.php";
    include '../backend/packages.back.php';
    include '../backend/room.back.php';

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $hotelUid = $_SESSION["hotelUid"];

    $hotel = new Hotel();
    $packages = new Packages();
    $room = new Room();

    $oldImg = $packages->showImage($hotelUid);

    if (isset($_POST['submit'])) {

        $packageId = $_POST['packageId'];

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

            $change = new Packages();

            $change ->changeImage($packageId, $newImg);

        }
        $packageName = $_POST['name'];
        $packagePrice = $_POST['price'];
        $packageDesc = $_POST['description'];

        $packages->changeName($packageId, $packageName);
        $packages->changePrice($packageId, $packagePrice);
        $packages->changeDesc($packageId, $packageDesc);

        echo "
            <script>
                alert('Changed Successfully'); 
                window.location.href='../frontend/packages_hotel.front.php'
            </script>";
    }

    if (isset($_POST['submitA'])) {

        if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] === UPLOAD_ERR_OK) {

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
        }
        $packageName = $_POST['name'];
        $packagePrice = $_POST['price'];
        $packageDesc = $_POST['description'];
        $packageImage = $newImg;

        $packages->setPackageDetails($hotelUid, $packageName, $packagePrice, $packageDesc, $packageImage);
        $packages->registerPackage();

        echo "
            <script>
                alert('Added Successfully'); 
                window.location.href='../frontend/packages_hotel.front.php'
            </script>";
    }

    if (isset($_POST['delete'])) {

        $packageId = $_POST['packageId'];

        $packages->deletePackage($packageId);

        echo "
            <script>
                alert('Deleted Successfully'); 
                window.location.href='../frontend/packages_hotel.front.php'
            </script>";
    }

    if (isset($_POST['submitR'])) {

        $packageId = $_POST['packageId'];
        $roomNum = $_POST['roomNum'];

        $room->setRoomDetails($roomNum, $packageId, $hotelUid);
        $room->registerRoom();

        echo "
            <script>
                alert('Added Successfully'); 
                window.location.href='../frontend/packages_hotel.front.php'
            </script>";
    }

    if (isset($_POST['deleteR'])) {
        $roomNum = $_POST['roomNum'];
        $packageId = $_POST['packageId'];

        if ($roomNum != "false") {
            $room->deleteRoomNum($roomNum, $packageId);

            echo "
                <script>
                    alert('Deleted Successfully'); 
                    window.location.href='../frontend/packages_hotel.front.php'
                </script>";
        } else {
            echo "
                <script>
                    alert('Please select a room number'); 
                    window.location.href='../frontend/packages_hotel.front.php'
                </script>";
        }
        
    }
?>