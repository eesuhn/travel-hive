<!DOCTYPE html>
<html>

<?php
include '../includes/navbar.php';
include '../backend/connection.back.php';
include '../backend/payment.back.php';
$custId = $_SESSION["custUid"];
$payment = new Payment();
?>

<div class="col d-flex justify-content-center">
    <div class="card mb-3" style="width: 700px; margin-top:20px">
        <img class="card-img-top" src="../images/beachsuite.png" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Beach Suite, Como Malfuushi</h5>
            <p class="card-text"><small>Check-in Date: 22/11/2003<br>Check-out Date: 25/11/2003</small></p>
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
                    <td>Ocean Villa</td>
                </tr>
                <tr>
                    <td>Number of Package:</td>
                    <td>4</td>
                </tr>
                <tr>
                    <td>Price per Package:</td>
                    <td>RM </td>
                </tr>
                <tr>
                    <td>Sub-Total:</td>
                    <td>$600.00</td>
                </tr>
                <tr>
                    <td>Booking Fee:</td>
                    <td>RM <?= $payment->getBookingFee() ?></td>
                </tr>
                <tr>
                    <td>Total Amount Payable:</td>
                    <td>RM <?= $payment->getFinalPrice() ?></td>
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
                    <button type="submit" name="submit" id="submit" value="pay-now">Pay Now</button>
                </form>
            </div>
        </div>
        <div id="continue-button" style="display: none;">
            <form id="pay-later" method="POST" action="../includes/payment.inc.php">
                <button type="submit" name="submit" id="submit" value="pay-later">Continue</button>
            </form>
        </div>
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