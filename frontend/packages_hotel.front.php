<?php
    include '../includes/navbar.php';
    include '../includes/packages_hotel.inc.php';

    $packageId = $packages->getPackageId($hotelUid);
?>

<html>

    <div class="title">
        <h1>Available Packages at <?= $hotel->showName($hotelUid); ?></h1>
        <div class="card-body" align="center">
            <a href="#addPackage" data-bs-toggle="modal" data-target="#addPackage" class="btn btn-primary">Add Package</a>
        </div>
    </div>

    <?php
        if (is_array($packageId)) {
            foreach ($packageId as $row) {
                $id = $row['packageId'];
    ?>

    <div class="col d-flex justify-content-center">
        <div class="card mb-3" style="width: 700px; margin-top:20px">
            <img class="card-img-top" src="<?= $packages->showImage($id); ?>" alt="Card image cap">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-7">
                        <h5 class="card-title"><?= $packages->showName($id); ?></h5>
                    </div>
                    <div class="col-sm-12 col-md-5 text-end">
                        <div class="btn-group mr-1 ">
                            <a href="#addRoom" data-bs-toggle="modal" data-bs-target="#addRoom<?= $id ?>" class="btn btn-primary btn-sm">Add rooms</a>
                        </div>
                        <div class="btn-group mr-1">
                            <a href="#deleteRoom" data-bs-toggle="modal" data-bs-target="#deleteRoom<?= $id ?>" class="btn btn-danger btn-sm">Delete rooms</a>
                        </div>
                    </div>
                </div>

                <p class="card-text"><small>RM <?= $packages->showPrice($id); ?></small></p>
                <p class="card-text"><small class="text-muted">
                    <?= $packages->showDesc($id); ?>
                </small></p>
                <div class="btn-group mr-1" style="margin-top: -16px;">
                    <a href="#updatePackage" data-bs-toggle="modal" data-bs-target="#updatePackage<?= $id ?>" class="btn btn-primary btn-sm">Update</a>
                </div>
                <div class="btn-group mr-1">
                    <form action="../includes/packages_hotel.inc.php" method="POST">
                        <input type="hidden" name="packageId" value="<?= $id ?>">
                        <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addRoom<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="profileTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileTitle">Add a Room</h5>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12">
                            <form id="add_rooms" method="POST" action="../includes/packages_hotel.inc.php" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="mb-3">
                                    <label for="">Room Available: </label>
                                        <textarea class="form-control" rows="5" style="resize: none;" readonly><?php
                                            $roomNum = $room->getRoomNum($id);

                                            if (is_array($roomNum)) {

                                                foreach ($roomNum as $row) {
                                                    echo $row['roomNum'];
                                                    echo "\n";
                                                }
                                            } else {
                                                echo "No room assigned";
                                            } ?>
                                        </textarea>  
                                </div>

                                <input type="hidden" name="packageId" value="<?= $id ?>">
                                <div class="mb-3">
                                    <label for="">Room Number</label>
                                    <input type="text" class="form-control" id="roomNum" name="roomNum" value="">
                                </div>

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary" name="submitR" id="submitR">Save changes</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="modal fade" id="deleteRoom<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="profileTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileTitle">Delete a Room</h5>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12">
                            <form id="delete_rooms" method="POST" action="../includes/packages_hotel.inc.php" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="mb-3">
                                <form>
                                    <label for="">Room Available: </label>
                                    <select class="form-select" aria-label="Default select example" name="roomNum">
                                        <option value="false" selected>Select the room you want to delete:</option>
                                        <?php
                                            $roomNum = $room->getRoomNum($id);

                                            if (is_array($roomNum)) {

                                                foreach ($roomNum as $row) {
                                                    echo "<option value='" . $row['roomNum'] . "'>" . $row['roomNum'] . "</option>";
                                                }
                                            } else {
                                                echo "No room assigned";
                                        } ?>
                                    </select>
                                    <input type="hidden" name="packageId" value="<?= $id ?>">
                                </form>
                                </div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary" name="deleteR" id="deleteR">Delete</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="updatePackage<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="profileTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileTitle">Update Package</h5>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12">
                        <form id="update_package" method="POST" action="../includes/packages_hotel.inc.php" enctype="multipart/form-data">
                            <div class="form-row">
                                <input type="hidden" name="packageId" value="<?= $id ?>">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $packages->showName($id); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" id="price" name="price" value="<?= $packages->showPrice($id); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" style="resize: none;" required><?= $packages->showDesc($id); ?></textarea>
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
    </div>

    <?php
            }
        } else {
            echo "No packages available";
        }
    ?>


    <div class="modal fade" id="addPackage" tabindex="-1" role="dialog" aria-labelledby="profileTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileTitle">Add Package</h5>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12">
                            <form id="add_package" method="POST" action="../includes/packages_hotel.inc.php" enctype="multipart/form-data">
                            <div class="form-row">
                                <input type="hidden" name="packageId" value="<?= $id ?>">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="" required>
                                </div>
                                <div class="mb-3">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" id="price" name="price" value="" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" style="resize: none;" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="input-group-text" for="fileUpload">Upload image</label>
                                    <input type="file" name="fileUpload" id="fileUpload" class="form-control" required>
                                </div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary" name="submitA" id="submitA">Save changes</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</html>