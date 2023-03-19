<?php
    include '../includes/payment.inc.php';

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $custId = $_SESSION["custUid"];
    $hotelId = $_SESSION["hotelId"];
    $checkIn = $_SESSION["checkInDate"];
    $checkOut = $_SESSION["checkOutDate"];
    $packageId = $_SESSION["packId"];
    $price = $_SESSION["price"];

    $hotel = new Hotel();
    $package = new Packages();
?>

<html>

    <div class="col d-flex justify-content-center">
        <div class="card mb-3" style="width: 700px; margin-top:20px">
            <img class="card-img-top" src="<?= $hotel->showImage($hotelId) ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?= $hotel->showName($hotelId); ?></h5>
                <p class="card-text"><small>Check-in Date: <?= $checkIn ?><br>Check-out Date: <?= $checkOut ?></small></p>
            </div>
        </div>
    </div>

    <div class="payment">
        <div class="container">
            <h1>Payment Details</h1>
            <div class="section">
                <table>
                    <tr>
                        <td>Package:</td>
                        <td><?= $package->showName($packageId) ?></td>
                    </tr>
                    <tr>
                        <td>Price per Package:</td>
                        <td>RM <?= $package->showPrice($packageId) ?></td>
                    </tr>
                    <tr>
                        <td>Number of Nights:</td>
                        <td><?= $payment->numOfNights($checkIn, $checkOut) ?></td>
                    </tr>
                    <tr>
                        <td>Sub-Total:</td>
                        <td>RM <?= $payment->getSubtotal($package->showPrice($packageId)) ?></td>
                    </tr>
                    <tr>
                        <td>Booking Fee:</td>
                        <td>RM <?= $payment->getBookingFee() ?></td>
                    </tr>
                    <tr style="background-color:#ECECEC;">
                        <td><b>Total Amount Payable:</b></td>
                        <td><b>RM <?= $payment->getFinalPrice($package->showPrice($packageId)) ?></b></td>
                    </tr>
                </table>
            </div>
            <div>
                <h1>To Be Paid at Hotel</h1>
            </div>
        </div>
    </div>
    <div style="padding-bottom: 40px;"></div>

</html>