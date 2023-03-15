<!DOCTYPE html>
<html>

<?php
    include '../includes/navbar.php';  
?>
    
<div class="booking-form">
    <form id="checkReservation" method="get" action="../includes/reservation.inc.php">
    <div class="row no-margin">
        <div class="col-md-3">
        <div class="form-group">
            <span class="form-label">Destination</span>
            <input class="form-control" name="location" type="text" placeholder="Country, ZIP, city...">
        </div>
        </div>
        <div class="col-md-6">
        <div class="row no-margin">
            <div class="col-md-5">
            <div class="form-group">
                <span class="form-label">Check In</span>
                <input class="form-control" name="checkInDate" type="date" required>
            </div>
            </div>
            <div class="col-md-5">
            <div class="form-group">
                <span class="form-label">Check out</span>
                <input class="form-control" name="checkOutDate" type="date" required>
            </div>
            </div>
        </div>
        </div>
        <div class="col-md-3">
        <div class="form-btn">
            <button class="submit-btn">Check Availability</button>
        </div>
        </div>
    </div>
    </form>
</div>

<div class="home">
    <div class="hero-image">
        <img src="../images/heroimg1.png" alt="Hero Image 1">
        <img src="../images/heroimg2.jpg" alt="Hero Image 2">
        <img src="../images/heroimg3.png" alt="Hero Image 3">
        <div class="caption">
        "Unlock the world with our booking platform and experience a world of possibilities. Your next adventure starts here."
        </div>
    </div>    
</div>        

</body>
</html>