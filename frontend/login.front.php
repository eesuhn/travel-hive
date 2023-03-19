<?php
    include '../includes/navbar.php';  
    include '../includes/registerform.inc.php'
?>

<html>

	<body>
		<section class="text-center">
			<div class="p-5 bg-image" style="
			background-image: url('../images/loginregbg.png');
			height: 300px;
			"></div>

			<div class="card mx-4 mx-md-5 shadow-5-strong" style="
			margin-top: -100px;
			background: hsla(0, 0%, 100%, 0.8);
			backdrop-filter: blur(30px);
			">
				<div class="card-body py-5 px-md-5">

					<div class="row d-flex justify-content-center">
						<div class="col-lg-4">
							<h2 class="fw-bold mb-5">Sign in to your account</h2>

							<form id="login" method="POST" action="../includes/login.inc.php">
							<div class="row">
								<select class="form-select" aria-label="form-select" name="accType">
									<option selected="customer" value="customer">Customer</option>
									<option value="hotel">Hotel</option>
								</select>
								<label class="form-label" for="accType" name="accType">Select Account Type</label>

								<div class="form-outline mb-2 py-5">
									<input type="email" name="email" id="email" class="form-control" />
									<label class="form-label" for="email" name="email">Email address</label>
								</div>

								<div class="form-outline mb-2">
									<input type="password" name="pwd" id="pwd" class="form-control"/>
									<label class="form-label" for="pwd" name="pwd">Password</label>
								</div>

								<a href="#register" data-bs-target="#register" data-bs-toggle="modal" style="text-decoration:none; margin:5px;">Don't have an account?</a>

								<center><button type="submit" name="submit" class="btn btn-primary" style="width: 40%;">Login</button></center>
							</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</body>

</html>