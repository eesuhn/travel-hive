<?php
    class Packages extends Database {
        
        private $hotelUid;
        private $packageName;
        private $packagePrice;
        private $packageDesc;
        private $packageImage;

        // constructor with empty parameters
        public function __construct() {
            
            $this->hotelUid = "";
            $this->packageName = "";
            $this->packagePrice = "";
            $this->packageDesc = "";
            $this->packageImage = "";
        }

        // setter for every attributes
        public function setPackageDetails ($hotelUid, $packageName, $packagePrice, $packageDesc, $packageImage) {
            
            $this->hotelUid = $hotelUid;
            $this->packageName = $packageName;
            $this->packagePrice = $packagePrice;
            $this->packageDesc = $packageDesc;
            $this->packageImage = $packageImage;
        }

        // create new package in database
        public function registerPackage () {
            $sql = "INSERT INTO packages (hotelUid, packageName, packagePrice, packageDesc, packageImage) VALUES (:value1, :value2, :value3, :value4, :value5)";

            $stmt = $this->connect()->prepare($sql);

            $stmt->bindParam(':value1', $value1);
            $stmt->bindParam(':value2', $value2);
            $stmt->bindParam(':value3', $value3);
            $stmt->bindParam(':value4', $value4);
            $stmt->bindParam(':value5', $value5);

            $value1 = $this->hotelUid;
            $value2 = $this->packageName;
            $value3 = $this->packagePrice;
            $value4 = $this->packageDesc;
            $value5 = $this->packageImage;

            if ($stmt->execute(array(':value1' => $value1, ':value2' => $value2, ':value3' => $value3, ':value4' => $value4, ':value5' => $value5))) {
                echo "<script>alert('Package successfully created'); window.location.href='../frontend/packagesH.front.php'</script>";
            } else {
                $error = $stmt->errorInfo();
                echo "Error: " . $error[2];
            }
        }

        // get all package id based on hotel id, put it in an array
        public function getPackageID ($hotelUid) {
            $sql = "SELECT packageID FROM packages where hotelUid = '$hotelUid';";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;

            } else {
                $error = $stmt->errorInfo();
                return "Error: " . $error[2];
            }
        }

        // display package name based on package id
        public function showName ($packageID) {
            $sql = "SELECT * FROM packages where packageID = '$packageID';";
            
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['packageName'];
            } else {
                $error = $stmt->errorInfo();
                echo "Error: " . $error[2];
            }
        }

        // display package price based on package id
        public function showPrice ($packageID) {
            $sql = "SELECT * FROM packages where packageID = '$packageID';";
            
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['packagePrice'];
            } else {
                $error = $stmt->errorInfo();
                echo "Error: " . $error[2];
            }
        }

        // display package description based on package id
        public function showDesc ($packageID) {
            $sql = "SELECT * FROM packages where packageID = '$packageID';";
            
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['packageDesc'];
            } else {
                $error = $stmt->errorInfo();
                echo "Error: " . $error[2];
            }
        }

        // display package image based on package id
        public function showImage ($packageID) {
            $sql = "SELECT * FROM packages where packageID = '$packageID';";
            
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['packageImage'];
            } else {
                $error = $stmt->errorInfo();
                return "Error: " . $error[2];
            }
        }

        // update package name based on package id
        public function changeName ($packageID, $packageName) {
            $sql = "UPDATE packages SET packageName = '$packageName' WHERE packageID = '$packageID';";

            $stmt = $this->getConnection()->prepare($sql);

            $stmt->execute();
        }

        // update package price based on package id
        public function changePrice ($packageID, $packagePrice) {
            $sql = "UPDATE packages SET packagePrice = '$packagePrice' WHERE packageID = '$packageID';";

            $stmt = $this->getConnection()->prepare($sql);

            $stmt->execute();
        }

        // update package description based on package id
        public function changeDesc ($packageID, $packageDesc) {
            $sql = "UPDATE packages SET packageDesc = '$packageDesc' WHERE packageID = '$packageID';";

            $stmt = $this->getConnection()->prepare($sql);

            $stmt->execute();
        }

        // update package image based on package id
        public function changeImage ($packageID, $packageImage) {
            $sql = "UPDATE packages SET packageImage = '$packageImage' WHERE packageID = '$packageID';";

            $stmt = $this->getConnection()->prepare($sql);

            $stmt->execute();
        }

        // delete package based on package id
        public function deletePackage ($packageID) {

            $oldImage = $this->showImage($packageID);

            // unlink the old image if there is any
            unlink("$oldImage");

            $sql = "DELETE FROM packages WHERE packageID = '$packageID';";

            $stmt = $this->getConnection()->prepare($sql);

            $stmt->execute();
        }
    }
?>