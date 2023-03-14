<?php
    include '../includes/navbar.php';
    include '../includes/packagesH.inc.php';

    $packageID = $packages->getPackageID($hotelUid);
?>

<!DOCTYPE html>
<html>

    <div class="title">
        <h1>Available Packages at <?=$hotel->showName($hotelUid);?></h1>
        <div class="card-body" align="center">
            <a href="#addPackage" data-bs-toggle="modal" data-target="#addPackage" class="btn btn-primary">Add Package</a>
        </div>
    </div>

    <?php
        // update package
        if (is_array($packageID)) {
            foreach ($packageID as $row) {
                $id = $row['packageID'];
    ?>

    <div class="col d-flex justify-content-center">
        <div class="card mb-3" style="width: 700px; margin-top:20px">
            <img class="card-img-top" src="<?=$packages->showImage($id);?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?=$packages->showName($id);?></h5>
                    <p class="card-text"><small>RM <?=$packages->showPrice($id);?></small></p>
                    <p class="card-text"><small class="text-muted">
                        <?=$packages->showDesc($id);?>
                    </small></p>
                    <a href="#updatePackage" data-bs-toggle="modal" data-bs-target="#updatePackage<?=$id?>" class="btn btn-primary btn-sm">Update</a>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updatePackage<?=$id?>" tabindex="-1" role="dialog" aria-labelledby="profileTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileTitle">Update Package</h5>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12">
                        <form id="update_package" method="POST" action="../includes/packagesH.inc.php" enctype="multipart/form-data">
                            <div class="form-row">
                                <input type="hidden" name="packageID" value="<?=$id?>">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?=$packages->showName($id);?>">
                                </div>
                                <div class="mb-3">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" id="price" name="price" value="<?=$packages->showPrice($id);?>">
                                </div>
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" style="resize: none;"><?=$packages->showDesc($id);?></textarea>
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

    <!-- add package -->
    <div class="modal fade" id="addPackage" tabindex="-1" role="dialog" aria-labelledby="profileTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileTitle">Add Package</h5>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12">
                        <form id="add_package" method="POST" action="../includes/packagesH.inc.php" enctype="multipart/form-data">
                            <div class="form-row">
                                <input type="hidden" name="packageID" value="<?=$id?>">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" id="price" name="price" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" style="resize: none;"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="input-group-text" for="fileUpload">Upload image</label>
                                    <input type="file" name="fileUpload" id="fileUpload" class="form-control">
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