<?php
    class Room extends Packages{

        private $roomNum;
        private $packageId;
        private $hotelUid;

        // constructor with empty parameters
        public function __construct() {
            $this->roomNum = "";
            $this->packageId = "";
            $this->hotelUid = "";
        }

        // setter for every attributes
        public function setRoomDetails($roomNum, $packageId, $hotelUid) {
            $this->roomNum = $roomNum;
            $this->packageId = $packageId;
            $this->hotelUid = $hotelUid;
        }

        // create new room in database
        public function registerRoom () {
            $sql = "INSERT INTO room (roomNum, packageId, hotelUid) VALUES (:value1, :value2, :value3)";

            $stmt = $this->connect()->prepare($sql);

            $stmt->bindParam(':value1', $value1);
            $stmt->bindParam(':value2', $value2);
            $stmt->bindParam(':value3', $value3);

            $value1 = $this->roomNum;
            $value2 = $this->packageId;
            $value3 = $this->hotelUid;

            if ($stmt->execute(array(':value1' => $value1, ':value2' => $value2, ':value3' => $value3))) {
                echo "<script>alert('Room successfully created'); window.location.href='../frontend/packagesH.front.php'</script>";
            } else {
                $error = $stmt->errorInfo();
                echo "Error: " . $error[2];
            }
        }

        // get all package id based on hotel id, put it in an array
        public function getRoomNum ($packageId) {
            $sql = "SELECT roomNum FROM room where packageId = '$packageId';";

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

        public function deleteRoomNum ($roomNum, $packageId) {
            $sql = "DELETE FROM room where roomNum = '$roomNum' AND packageId = '$packageId';";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
        }
    }
?>