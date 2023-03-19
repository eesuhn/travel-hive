<?php
	include '../includes/navbar.php';
	include '../includes/profile_customer.inc.php';

	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	$custId = $_SESSION["custUid"];
?>

<html>

	<div class="col d-flex justify-content-center">
		<div class="card mb-3" style="width: 700px; margin-top:20px">
			<div class="card-body">
				<h5 class="card-title">Welcome back,
					<?php
						echo $cust->showName($custId);
					?>
				</h5>
				<p class="card-text"><small class="text-muted">Name: 
					<?= $cust->showName($custId); ?>
				</small></p>

				<p class="card-text"><small class="text-muted">Email: 
					<?= $cust->showEmail($custId); ?>
				</small></p>

				<p class="card-text"><small class="text-muted">Password: ********
				</small></p>

				<p class="card-text"><small class="text-muted">Age: 
					<?= $cust->showAge($custId); ?>
				</small></p>

				<p class="card-text"><small class="text-muted">Gender: 
					<?= $cust->showGender($custId); ?>
				</small></p>

				<p class="card-text"><small class="text-muted">Place of origin: 
					<?= $cust->showOrigin($custId); ?>
				</small></p>
			</div>
		</div>
	</div>
	<div class="row px-2 py-2 justify-content-center col d-flex">
		<div class="col-sm-7 px-3 py-3">
			<div class="card bg-light border-light text-center">
				<h5 class="card-header">Update Profile</h5>
				<div class="card-body">
					<p class="card-text">Update or make changes to your profile</p>
					<a href="#updateProfile" data-bs-toggle="modal" data-target="#updateProfile" class="btn btn-primary">Update Profile</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="updateProfile" tabindex="-1" role="dialog" aria-labelledby="profileTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="profileTitle">Update Profile</h5>
				</div>
				<div class="modal-body">
					<div class="row d-flex justify-content-center">
						<div class="col-lg-8">
							<form id="updateProfile" method="POST" action="../includes/profile_customer.inc.php">
							<div class="form-row">
								<div class="mb-3">
									<label for="text">Name</label>
									<input type="text" class="form-control" id="name" name="name" value="<?= $cust->showName($custId) ?>" required>
								</div>
								<div class="mb-3">
									<label for="email">Email</label>
									<input type="email" class="form-control" id="email" name="email" value="<?= $cust->showEmail($custId) ?>" required>
								</div>
							</div>
							<div class="mb-3">
								<label for="pwd">Password</label>
								<input type="password" class="form-control" id="pwd" name="pwd" placeholder="New Password" required>
							</div>
							<div class="mb-3">
								<label for="age">Age</label>
								<input type="number" class="form-control" id="age" name="age" value="<?= $cust->showAge($custId) ?>" required>
							</div>
							<div class="mb-3">
								<div class="row">
									<label>Gender</label>
									<div class="col-6">
										<input type="radio" id="male" name="gender" value="M" required>
										<label for="male">Male</label>
									</div>
									<div class="col-6">
										<input type="radio" id="female" name="gender" value="F" required>
										<label for="female">Female</label>
									</div>
								</div>
								<div class="mb-3">
									<div class="row">
										<div class="col-12">
											<label for="placeOrigin">Place of Origin</label>
											<input type="placeOrigin" class="form-control" id="origin" name="origin" value="<?= $cust->showOrigin($custId) ?>" required>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button class="btn btn-primary" name="submit" id="submit">Save changes</button>
							</form>
				</div>
			</div>
		</div>
	</div>

</html>