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
          <form id="register_user" method="POST" action="../includes/register.inc.php">
          <div class="form-row">
          <div class="mb-3">
              <label for="text">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Name">
              <div id="nameHelp" class="form-text">This is how we will be announcing you on our page.</div>
            </div>
            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="pwd">Password</label>
              <input type="password" class="form-control" id="pwd" name ="pwd" placeholder="Password">
            </div>
          </div>
          <div class="mb-3">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age">
          </div>
          <div class="mb-3">
            <label for="placeOrigin">Place of Origin</label>
            <input type="placeOrigin" class="form-control" id="origin" name="origin">
          </div>
          <button type="submit" name="submitU" class="btn btn-primary">Register</button>

        </form>
        </div>
      </div>
    </div>
  </div>
</section>


</body>
</html>