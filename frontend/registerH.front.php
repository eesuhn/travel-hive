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
          <h2 class="fw-bold mb-5">Register an account</h2>
          <form id="register_hotel" method="POST" action="../includes/register.inc.php" enctype="multipart/form-data">
          <div class="form-row">
          <div class="mb-3">
              <label for="hName">Hotel Name</label>
              <input type="text" class="form-control" id="hName" name="hName" placeholder="Alila Hotel">
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="hEmail" name="hEmail" placeholder="Alila@gmail.com">
            </div>
            <div class="mb-3">
              <label for="pwd">Password</label>
              <input type="password" class="form-control" id="hPwd" name="hPwd" placeholder="Password">
            </div>
          </div>
          <div class="mb-3">
            <label for="add">Address</label>
            <input type="text" class="form-control" id="hAdd" name="hAdd" placeholder="4, Jalan Tun Dr Ismail...">
          </div>
          <div class="form-floating">
          <textarea class="form-control" id="hDesc" name="hDesc" style="height: 100px"></textarea>
          <label for="desc">Description</label>
          <div id="descHelp" class="form-text">Share a little on your hotel, make it interesting!</div>
          </div>
          <div class="input-group mb-3 py-3">
          <label class="input-group-text" for="fileUpload">Upload an image of your hotel</label>
          <input type="file" name="fileUpload" id="fileUpload"  class="form-control">
          </div>
          <button type="submit" name="submitH" class="btn btn-primary">Register</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</section>  
<div style="margin-bottom: 30px;"></div>


</div>
  
</form>

</body>
</html>