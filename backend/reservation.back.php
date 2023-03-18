<?php

    class Reservation extends Database {
        private $location;
        private $checkInDate;
        private $checkOutDate;
        private $custUid;
        private $roomId;

        public function __construct() {
            $this->location = "";
            $this->checkInDate = "";
            $this->checkOutDate = "";
        }
        
        public function setSearchDetails($location, $checkInDate, $checkOutDate){
            $this->location = "$location";
            $this->checkInDate = "$checkInDate";
            $this->checkOutDate = "$checkOutDate";
        }

        public function getHotelDetails(){
            $sql = "
            SELECT DISTINCT h.*
            FROM hotel h
            JOIN packages p ON h.hotelUid = p.hotelUid
            JOIN room r ON p.packageId = r.packageId
            LEFT JOIN reservation s ON r.roomId = s.roomId
            WHERE CONCAT(h.hotelName, h.hotelAdd) LIKE '%$this->location%'
            AND r.roomId NOT IN (
                SELECT s.roomId 
                FROM reservation s 
                WHERE s.roomId = r.roomId 
                AND (s.checkInDate <= '$this->checkOutDate' AND s.checkOutDate >= '$this->checkInDate')
            ) OR s.roomId IS NULL
            ";

            $stmt = $this->connect()->query($sql);
            if ($stmt->rowCount() > 0) {
                echo '<div class="title"><h1>Our Available Hotels</h1></div>';
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '
                    <div class="col d-flex justify-content-center">
                        <div class="card mb-3" style="width: 700px; margin-top:20px">
                            <img class="card-img-top" src='.$row["hotelImage"].' alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">'.$row["hotelName"].'</h5>
                                <p class="card-text">'.$row["hotelAdd"].'</p>
                                <p class="card-text"><small class="text-muted">'.$row["hotelDesc"].'</small></p>
                                <a class="btn btn-primary btn-sm" href="../frontend/reservation.front.php?hotelId='.$row["hotelUid"].'" role="button">View More</a>
                            </div>
                        </div>
                    </div>
                    ';
                }
            } else {
                echo "<script>alert('No hotels were found for the given location or date. Please try again.'); window.location.href='../index/index.php'</script>";
            }
        }
        
        public function getPackageDetails($hotelId,$checkInDate,$checkOutDate){
            $sql = "
            SELECT DISTINCT p.*
            FROM packages p
            JOIN hotel h ON h.hotelUid = p.hotelUid
            JOIN room r ON p.packageId = r.packageId
            LEFT JOIN reservation s ON r.roomId = s.roomId
            WHERE h.hotelUid = '$hotelId'
            AND p.isDeleted = '0'
            AND r.roomId NOT IN (
                SELECT s.roomId 
                FROM reservation s 
                WHERE s.roomId = r.roomId 
                AND (s.checkInDate <= '$checkOutDate' AND s.checkOutDate >= '$checkInDate')
            )
            AND r.isDeleted = '0'
            ;";
            
            $stmt = $this->connect()->query($sql);
            if ($stmt->rowCount() > 0) {
                echo '<div class="title"><h1>Available Packages</h1></div>';
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '
                    <div class="col d-flex justify-content-center">
                        <div class="card mb-3" style="width: 700px; margin-top:20px">
                        <img class="card-img-top" src='.$row["packageImage"].' alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title">'.$row["packageName"].'</h5>
                                <p class="card-text"><small>RM'.$row["packagePrice"].'/night</small></p>
                                <p class="card-text"><small class="text-muted">
                                '.$row["packageDesc"].'
                                </small></p>
                                <form action="../frontend/payment.front.php" method="POST">
                                    <input type="hidden" name="packageId" value='.$row["packageId"].'>
                                    <a class="btn btn-primary btn-sm" href="../frontend/payment.front.php?packId='.$row["packageId"].'" role="button">Book now</a>
                                </form>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo "No packages are available at the moment. Consider changing the check in and check out dates.";
            }
        }
        
        public function setReservationDetails($checkInDate, $checkOutDate, $custUid, $packageId){

            $this->checkInDate = "$checkInDate";
            $this->checkOutDate = "$checkOutDate";
            $this->custUid = "$custUid";

            /*
            based on packageId, obtain one roomId that is available for the given date range and assign it to $this->roomId
            */
            $sql = "
            SELECT DISTINCT r.roomId
            FROM room r
            JOIN packages p ON p.packageId = r.packageId
            LEFT JOIN reservation s ON r.roomId = s.roomId
            WHERE p.packageId = '$packageId'
            AND r.roomId NOT IN (
                SELECT s.roomId 
                FROM reservation s 
                WHERE s.roomId = r.roomId 
                AND (s.checkInDate <= '$this->checkOutDate' AND s.checkOutDate >= '$this->checkInDate')
            )
            AND r.isDeleted = '0'
            LIMIT 1;
            ";

            $stmt = $this->connect()->query($sql);

            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $this->roomId = $row["roomId"];
                }
            } else {
                echo "No rooms are available at the moment.";
            }
        }

        // create new reservation in database using pdo
        public function registerReservation () {
            $sql = "INSERT INTO reservation (checkInDate, checkOutDate, custUid, roomId) VALUES (:value1, :value2, :value3, :value4)";

            $stmt = $this->connect()->prepare($sql);

            $stmt->bindParam(':value1', $value1);
            $stmt->bindParam(':value2', $value2);
            $stmt->bindParam(':value3', $value3);
            $stmt->bindParam(':value4', $value4);

            $value1 = $this->checkInDate;
            $value2 = $this->checkOutDate;
            $value3 = $this->custUid;
            $value4 = $this->roomId;

            if (!$stmt->execute(array(':value1' => $value1, ':value2' => $value2, ':value3' => $value3, ':value4' => $value4))) {
                $error = $stmt->errorInfo();
                echo "Error: " . $error[2];
            }
        }

        public function showReservations($custUid){
            $sql = "
            SELECT r.resId, r.checkInDate, r.checkOutDate, h.hotelName, h.hotelAdd, h.hotelImage, p.packageName
            FROM reservation r 
            JOIN room s ON r.roomId = s.roomId
            JOIN packages p ON p.packageId = s.packageId
            LEFT JOIN hotel h ON h.hotelUid = p.hotelUid
            WHERE custUid = $custUid;     
            ";
            $stmt = $this->connect()->query($sql);
            if ($stmt->rowCount() > 0) {    
                echo'
                <div class="title">
                <h1>Your Reservations</h1>
                </div>
                ';
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '
                <div class="col d-flex justify-content-center">
                    <div class="card mb-3" style="width: 700px; margin-top:20px">
                        <img class="card-img-top" src='.$row["hotelImage"].'alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">'.$row["packageName"].', '.$row["hotelName"].'</h5>
                        <p class="card-text">'.$row["hotelAdd"].'</p>
                        <p class="card-text"><small>Check-in Date: '.$row["checkInDate"].'<br>Check-out Date: '.$row["checkOutDate"].'</small></p>
                        <p class="card-text"><small>Payment: </small></p>
                        <a class="btn btn-primary btn-sm" href="../includes/cancelReservation.inc.php?action=delete&resId='.$row["resId"].'" role="button">Cancel Reservation</a>
                    </div>
                    </div>
                </div>
                ';
                }
            }else{
                echo'
                <div class="title">
                <h1>No Reservations Found</h1>
                </div>
                ';
            }
        }

        public function cancelReservation($resId){
            $sql = "DELETE FROM reservation WHERE resId = $resId";
            if($this->connect()->query($sql)){
                echo "<script>alert('Your reservation have been successfully cancelled.'); window.location.href='../frontend/showReservation.front.php'</script>";
            }else{
                echo "<script>alert('Your reservation have not been cancelled successfully. Please try again.'); window.location.href='../frontend/showReservation.front.php'</script>";
            }

        }
    }
