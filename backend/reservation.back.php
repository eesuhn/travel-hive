<?php
    class Reservation extends Database {
        private $location;
        private $checkInDate;
        private $checkOutDate;

        public function __construct() {
            $this->location = "";
            $this->checkInDate = "";
            $this->checkOutDate = "";
        }
        
        public function setReservationDetails($location, $checkInDate, $checkOutDate){
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
            WHERE h.hotelName LIKE '%$this->location%'
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
            AND r.roomId NOT IN (
                SELECT s.roomId 
                FROM reservation s 
                WHERE s.roomId = r.roomId 
                AND (s.checkInDate <= '$checkOutDate' AND s.checkOutDate >= '$checkInDate')
            )
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
                                    <input type="hidden" name="packageID" value='.$row["packageId"].'>
                                    <a class="btn btn-primary btn-sm" href="../frontend/payment.front.php?packId='.$row["packageId"].'" role="button">Book now</a>
                                </form>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo "No packages are available at the moment.";
            }
        }
        
    }

?>