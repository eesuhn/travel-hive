<?php
    class Room extends Packages{

        private $roomId;
        private $roomNum;
        private $packageId;
        private $hotelUid;

        public function __construct(){
            $this->roomId = "";
            $this->roomNum = "";
            $this->packageId = "";
            $this->hotelUid = "";
        }

        public function setRoomDetails($roomId,$roomNum,$packageId,$hotelUid){
            $this->roomId = $roomId;
            $this->roomNum = $roomNum;
            $this->packageId = $packageId;
            $this->hotelUid = $hotelUid;
        }

        public function getRoomId ($packageId){
            $sql = "SELECT roomId FROM room where packageId = '$packageId';";
            
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['roomId'];
            } else {
                $error = $stmt->errorInfo();
                echo "Error: " . $error[2];
            }
        }

        // get all package id based on hotel id, put it in an array
        /*
        public function getRoomId ($hotelUid) {
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

        public function showRoom ($packageID) {
            $sql = "SELECT * FROM room where packageID = '$packageID';";
            
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['roomNum'];
            } else {
                $error = $stmt->errorInfo();
                echo "Error: " . $error[2];
            }
        }
        */



        



    }
?>