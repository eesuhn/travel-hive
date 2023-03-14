<?php
    class Reservation extends Database {
        protected $location;
        protected $checkInDate;
        protected $checkOutDate;

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
            $sql = "SELECT h.* FROM hotel h
            JOIN packages p ON h.hotelUid = p.hotelUid
            WHERE hotelAdd LIKE '%$this->location%'
            AND p.noOfPackages>0
            AND p.packageId NOT IN (
            SELECT r.packageId 
            FROM reservation r 
            WHERE r.hotelUid = p.hotelUid 
            AND (r.checkInDate <= '$this->checkOutDate' AND r.checkOutDate >= '$this->checkInDate')
            )
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
                                <a class="btn btn-primary btn-sm" href="../frontend/reservation.front.php?id='.$row["hotelUid"].'" role="button">View More</a>
                                </div>
                        </div>
                    </div>
                    ';
                }
            } else {
                echo "No hotels are available at the moment.";
            }
        }
        
        public function getPackageDetails($hotelId){
            $sql = "SELECT * FROM packages WHERE hotelUid LIKE '%$hotelId%'";
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
                        <a class="btn btn-primary btn-sm" href="#" role="button">Book now</a>
                    </div>
                    </div>
                </div>
                    ';
                }
            } else {
                echo "No packages are available at the moment.";
            }
        }

        public function getReservations($custId){
        
        }
    }

?>