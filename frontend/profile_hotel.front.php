<?php
    include '../includes/navbar.php';
    include '../includes/profile_hotel.inc.php';

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $hotelUid = $_SESSION["hotelUid"];
    $hotel = new Hotel();
?>

<html>

    <div class="col d-flex justify-content-center">
        <div class="card mb-3" style="width: 700px; margin-top:20px">
            <div class="card-body">
                <h5 class="card-title">Welcome back,
                    <?php
                        echo $hotel->showName($hotelUid);
                    ?>
                </h5>

                <center>
                <div class="card mb-3" style="width: 500px; margin-top:10px">
                    <img class="card-img-top" src="<?= $hotel->showImage($hotelUid); ?>" alt="Card image cap" />
                </div>
                </center>

                <p class="card-text"><small class="text-muted">Name: 
                    <?= $hotel->showName($hotelUid); ?>
                </small></p>

                <p class="card-text"><small class="text-muted">Email: 
                    <?= $hotel->showEmail($hotelUid); ?>
                </small></p>

                <p class="card-text"><small class="text-muted">Password: ********
                </small></p>

                <p class="card-text"><small class="text-muted">Address: 
                    <?= $hotel->showAdd($hotelUid); ?>
                </small></p>

                <p class="card-text"><small class="text-muted">Description: 
                    <?= $hotel->showDesc($hotelUid); ?>
                </small></p>
            </div>
        </div>
    </div>

    <div class="row px-2 py-2">
        <div class="col-sm-12 px-3 py-3">
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
                        <div class="col-lg-12">
                            <form id="update_hotel" method="POST" action="../includes/profile_hotel.inc.php" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $hotel->showName($hotelUid); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $hotel->showEmail($hotelUid); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="pwd">Password</label>
                                    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="New Password">
                                </div>
                                <div class="mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="<?= $hotel->showAdd($hotelUid); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" id="description" name="description" value="<?= $hotel->showDesc($hotelUid); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="input-group-text" for="fileUpload">Upload image</label>
                                    <input type="file" name="fileUpload" id="fileUpload" class="form-control">
                                </div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary" name="submit" id="submit">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</html>