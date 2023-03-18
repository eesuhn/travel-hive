<!DOCTYPE html>
<html>

    <?php
        include '../includes/navbar.php';
        include '../backend/connection.back.php';
        include '../backend/reservation.back.php';

        $showReservations = new Reservation();
        $showReservations->showReservations($_SESSION["custUid"]);
    ?>

</html>