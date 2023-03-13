<?php
    include '../includes/navbar.php';
    include '../includes/packagesH.inc.php';

    $packageID = $packages->getPackageID($hotelUid);
?>

<!DOCTYPE html>
<html>

    <div class="title">
        <h1>Available Packages at <?=$hotel->showName($hotelUid);?></h1>
    </div>

    <?php
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
                    <a class="btn btn-primary btn-sm" href="#" role="button">Edit</a>
            </div>
        </div>
    </div>

    <?php
        }
    ?>
    
</html>