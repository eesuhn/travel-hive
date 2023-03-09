<!DOCTYPE html>
<html>

<?php
    include '../includes/navbar.php';  
?>

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
        <div class="col-lg-8">
          <h2 class="fw-bold mb-5">Sign in to your account</h2>
          
          <form id="login" method="POST" action="../includes/login.inc.php">
            <div class="row">
            <div class="form-check px-5 py-2">
              <input class="form-check-input" type="radio" name="accType" value="customer" checked>
              <label class="form-check-label">
              Customer
              </label>
            </div>
            <div class="form-check px-5 py-3">
              <input class="form-check-input" type="radio" name="accType" value="hotel">
              <label class="form-check-label">
              Hotel
              </label>
          </div>
            <div class="form-outline mb-4">
              <input type="email" name="email" id="email" class="form-control" />
              <label class="form-label" for="email" name="email">Email address</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" name="pwd" id="pwd" class="form-control"/>
              <label class="form-label" for="pwd" name="pwd">Password</label>
            </div>
            <div id="formHelp" class="form-text">Don't have an account?</div>
            <a href="../frontend/registerC.front.php" style="padding: 7px; margin-bottom: 7px;">
                Register as User
            </a>
            <a href="../frontend/registerH.front.php" style="padding: 7px; margin-bottom: 7px;">
                Register as Hotel Organization
            </a>
            <button type="submit" name="submit" class="btn btn-primary">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>


</body>
</html>