<!DOCTYPE html>
<html>

    <?php
        include '../includes/navbar.php';
    ?>

<section class="text-center">

  <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: 50px;
        margin-bottom: 50px;
        background: hsla(0, 0%, 100%, 0.8);
        ">
    <div class="card-body py-5 px-md-5">

      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-5">Add a new Package</h2>
          
        <form>

            <div class="form-group row py-5">
                <label for="packName" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="packName">
                </div>
            </div>

            <div class="form-group row">
                <label for="packPrice" class="col-sm-3 col-form-label">Price</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="packPrice">
                </div>
            </div>

            <div class="form-group row py-5">
                <label for="desc" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-8">
                <textarea class="form-control" id="desc" rows="5"></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4">Cancel</button>
            <button type="submit" class="btn btn-primary btn-block mb-4">Save</button>
        </form>

          
        </div>
      </div>
    </div>
  </div>
</section>











</html>