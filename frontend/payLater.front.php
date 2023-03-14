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
        <div>
            <h1>To Be Paid at Hotel</h1>
        </div>
    </div>
</div>

</html>