<?php
	include '../includes/navbar.php';
	include '../includes/profileH.inc.php';
	include '../backend/reservation.back.php';
	$hotelUid = $_SESSION["hotelUid"];
	$hotel = new Hotel();
	$res = new Reservation();
?>
<html>
	<center>
		<h3 style="margin-top:15px;">Welcome back</small></h3>
	</center>

	<div class="col d-flex justify-content-center">
		<div class="card mb-3" style="width: 700px; margin-top:20px">
			<img class="card-img-top" src="<?=$hotel->showImage($hotelUid);?>" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title"><?=$hotel->showName($hotelUid);?></h5>
				<p class="card-text"><small class="text-muted">
					<?=$hotel->showAdd($hotelUid);?>
				</small></p>
			</div>
		</div>
	</div>

	<div class="row px-2 py-2 justify-content-center col d-flex">
		<div class="col-sm-7 px-3 py-3">
			<div class="card bg-light border-light text-center">
				<h5 class="card-header">Update Profile</h5>
				<div class="card-body">
				<p class="card-text">Update your hotel profile to be displayed</p>
					<a href="profileH.front.php" class="btn btn-primary">Update Profile</a>
				</div>
			</div>
		</div>
	</div>

	<div class="row px-2 py-2 justify-content-center col d-flex">
		<div class="col-sm-7 px-3 py-3">
			<div class="card bg-light border-light text-center">
				<h5 class="card-header">View Packages</h5>
				<div class="card-body">
					<p class="card-text">Add new packages or edit existing packages</p>
					<a href="packagesH.front.php" class="btn btn-primary">Update Packages</a>
				</div>
			</div>
		</div>
	</div>

	<div class="row px-2 py-2 justify-content-center col d-flex">
		<div class="col-sm-7 px-3 py-3">
			<div class="card bg-light border-light text-center">
				<h5 class="card-header">View Reservations</h5>
				<div class="card-body">
					<p class="card-text">Manage your reservations here</p>
					<a href="#reservation" data-bs-target="#reservation" data-bs-toggle="modal" class="btn btn-primary">View reservations</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade modal-xl " id="reservation" aria-hidden="true" aria-labelledby="reservationTitle" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="reservationTitle">Your Reservations</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<?php
					$res->showHotelReservation($hotelUid);
					?>
				</div>
			</div>
		</div>
	</div>
</html>