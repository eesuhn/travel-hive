<?php
    class Packages extends Database{
        
        private $hotelUid;
        private $packageName;
        private $packagePrice;
        private $packageDesc;
        private $packageImage;

        public function __construct() {
            
            $this->hotelUid = "";
            $this->packageName = "";
            $this->packagePrice = "";
            $this->packageDesc = "";
            $this->packageImage = "";
        }

        public function setPackageDetails ($hotelUid, $packageName, $packagePrice, $packageDesc, $packageImage) {
            
            $this->hotelUid = $hotelUid;
            $this->packageName = $packageName;
            $this->packagePrice = $packagePrice;
            $this->packageDesc = $packageDesc;
            $this->packageImage = $packageImage;
        }

        public function registerPackage () {
            $sql = 
            "INSERT INTO packages (hotelUid, packageName, packagePrice, packageDesc, packageImage) 
            VALUES (:value1, :value2, :value3, :value4, :value5)";

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

            if ($stmt->execute(
                array(':value1' => $value1, ':value2' => $value2, ':value3' => $value3, 
                ':value4' => $value4, ':value5' => $value5))) {

                echo "<script>alert('Package successfully created'); 
                window.location.href='../frontend/packages_hotel.front.php'</script>";

            } else {
                $error = $stmt->errorInfo();
                echo "Error: " . $error[2];
            }
        }

        public function getPackageId ($hotelUid) {
            $sql = "SELECT packageId FROM packages where hotelUid = '$hotelUid' AND isDeleted = '0';";

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

        public function showName ($packageId) {
            $sql = "SELECT * FROM packages where packageId = '$packageId';";
            
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['packageName'];

            } else {
                $error = $stmt->errorInfo();
                echo "Error: " . $error[2];
            }
        }

        public function showPrice ($packageId) {
            $sql = "SELECT * FROM packages where packageId = '$packageId';";
            
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['packagePrice'];

            } else {
                $error = $stmt->errorInfo();
                echo "Error: " . $error[2];
            }
        }

        public function showDesc ($packageId) {
            $sql = "SELECT * FROM packages where packageId = '$packageId';";
            
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['packageDesc'];

            } else {
                $error = $stmt->errorInfo();
                echo "Error: " . $error[2];
            }
        }

        public function showImage ($packageId) {
            $sql = "SELECT * FROM packages where packageId = '$packageId' AND isDeleted = '0';";
            
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['packageImage'];

            } else {
                $error = $stmt->errorInfo();
                return "Error: " . $error[2];
            }
        }

        public function changeName ($packageId, $packageName) {
            $sql = "UPDATE packages SET packageName = '$packageName' WHERE packageId = '$packageId';";

            $stmt = $this->connect()->prepare($sql);

            $stmt->execute();
        }

        public function changePrice ($packageId, $packagePrice) {
            $sql = "UPDATE packages SET packagePrice = '$packagePrice' WHERE packageId = '$packageId';";

            $stmt = $this->connect()->prepare($sql);

            $stmt->execute();
        }

        public function changeDesc ($packageId, $packageDesc) {
            $sql = "UPDATE packages SET packageDesc = '$packageDesc' WHERE packageId = '$packageId';";

            $stmt = $this->connect()->prepare($sql);

            $stmt->execute();
        }

        public function changeImage ($packageId, $packageImage) {
            $sql = "UPDATE packages SET packageImage = '$packageImage' WHERE packageId = '$packageId';";

            $stmt = $this->connect()->prepare($sql);

            $stmt->execute();
        }

        public function deletePackage ($packageId) {

            $oldImage = $this->showImage($packageId);

            unlink("$oldImage");

            $sql = "UPDATE room SET isDeleted = '1' WHERE packageId = '$packageId'";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            $sql2 = "UPDATE packages SET isDeleted= '1' WHERE packageId = '$packageId';";
            $stmt2 = $this->connect()->prepare($sql2);
            $stmt2->execute();
        }
    }
?>