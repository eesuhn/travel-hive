<?php
    include '../includes/navbar.php';
    include '../backend/connection.back.php';
    include '../backend/account.back.php';
    include '../backend/hotel.back.php';
    $hotelUid = $_SESSION["hotelUid"];
?>

<div class="col d-flex justify-content-center">
    <div class="card mb-3" style="width: 700px; margin-top:20px">
        <div class="card-body">
            <h5 class="card-title">Welcome back, 
                <?php
                $hotel = new Hotel();
                echo $hotel->showName($hotelUid);
                ?>
            </h5>
            <p class="card-text"><small class="text-muted">
                    Name: <?=$hotel->showName($hotelUid);?>
                </small></p>
            <p class="card-text"><small class="text-muted">
                    Email: <?=$hotel->showEmail($hotelUid);?>
                </small></p>
            <p class="card-text"><small class="text-muted">
                    Address: <?=$hotel->showAdd($hotelUid);?>
                </small></p>
            <p class="card-text"><small class="text-muted">
                    Description: <?=$hotel->showDesc($hotelUid);?>
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
                    <div class="col-lg-8">
                        <form id="updateProfile" method="POST" action="../includes/profileH.inc.php">
                        <div class="form-row">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?=$hotel->showName($hotelUid);?>">
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?=$hotel->showEmail($hotelUid);?>">
                            </div>
                            <div class="mb-3">
                                <label for="age">Address</label>
                                <input type="number" class="form-control" id="address" name="address" value="<?=$hotel->showAdd($hotelUid);?>">
                            </div>
                            <div class="mb-3">
                                <label for="placeOrigin">Description</label>
                                <input type="placeOrigin" class="form-control" id="description" name="description" value="<?=$hotel->showDesc($hotelUid);?>">
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
</div>