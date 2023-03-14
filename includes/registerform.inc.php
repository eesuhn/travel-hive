<div class="modal fade" id="register" aria-hidden="true" aria-labelledby="registerTitle" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="registerTitle">Select Account Type</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Please select type of account to be created.
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#registerUser" data-bs-toggle="modal">Customer</button>
        <button class="btn btn-primary" data-bs-target="#registerHotel" data-bs-toggle="modal">Hotel</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade modal-lg" id="registerUser" aria-hidden="true" aria-labelledby="registerUserTitle" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="registerUserTitle">Create an Account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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
              <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password">
            </div>
          </div>
          <div class="mb-3">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age" name="age">
          </div>
          <div class="mb-3">
            <p>Gender</p>
            <div class="row">
              <div class="col-6">
                <input type="radio" id="male" name="gender" value="M">
                <label for="male">Male</label>
              </div>
              <div class="col-6">
                <input type="radio" id="female" name="gender" value="F">
                <label for="female">Female</label>
              </div>
            </div>
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
<div class="modal fade modal-lg" id="registerHotel" aria-hidden="true" aria-labelledby="registerHotelTitle" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="registerHotelTitle">Create an Account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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
            <input type="file" name="fileUpload" id="fileUpload" class="form-control">
          </div>
          <button type="submit" name="submitH" class="btn btn-primary">Register</button>
        </form>
      </div>
    </div>
  </div>
</div>