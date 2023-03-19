<?php
    include '../includes/payment.inc.php';

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $custId = $_SESSION["custUid"];
    $hotelId = $_SESSION["hotelId"];
    $checkIn = $_SESSION["checkInDate"];
    $checkOut = $_SESSION["checkOutDate"];
    $packageId = $_SESSION["packId"] = $_GET["packId"];

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
            <h1>Booking Details</h1>
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
                        <td><b>RM
                            <?php
                            $_SESSION['price'] = $payment->getFinalPrice($package->showPrice($packageId));

                            echo $_SESSION['price'];
                            ?>
                        </b></td>
                    </tr>
                </table>
            </div>
            <div class="section">
                <h1>Payment Options</h1>
                <form>
                    <input type="radio" name="payment" value="now" id="pay-now">
                    <label for="pay-now">Pay Now</label><br>
                    <input type="radio" name="payment" value="later" id="pay-later">
                    <label for="pay-later">Pay Later</label>
                </form>
            </div>

        <div id="payment-details" style="display: none;">
            <div class="section">
                <h1>Payment Details</h1>
                <form id="pay-now" method="POST" action="../includes/payment.inc.php">
                    <label for="card-number">Card Number:</label><br>
                    <input type="text" id="card-number"><br>
                    <label for="expiry-date">Expiry Date:</label><br>
                    <input type="text" id="expiry-date"><br>
                    <label for="cvv">CVV:</label><br>
                    <input type="text" id="cvv"><br>

                    <button type="submit" id="submit" name="submit" value="pay-now">Pay Now</button>
                </form>
            </div>
        </div>

        <div id="continue-button" style="display: none;">
            <form id="pay-later" method="POST" action="../includes/payment.inc.php">
                <button type="submit" name="submit" id="submit" value="pay-later">Continue</button>
            </form>
        </div>
    </div>

    <div style="padding-bottom: 40px;"></div>

    <script>
        var paymentOptions = document.getElementsByName("payment");
        var paymentDetails = document.getElementById("payment-details");
        var continueButton = document.getElementById("continue-button")

        for (var i = 0; i < paymentOptions.length; i++) {
            paymentOptions[i].addEventListener("click", function() {
                if (this.value == "now") {
                    paymentDetails.style.display = "block";
                    continueButton.style.display = "none";
                } else {
                    paymentDetails.style.display = "none";
                    continueButton.style.display = "block";
                }
            });
        }
    </script>

</html>