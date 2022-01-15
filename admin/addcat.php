<?php include "inc/header.php"; ?>
<div class="container-fluid">
    <div class="row">
        <?php include "../admin/inc/indexnav.php"; ?>
        <div class="col-md-6 card my-3">
            <div class="add-cat-form">
                <?php
                $userHandler = new userHandler();
                $insertCat = $userHandler->insertCat();
                ?>
                <form action="addcat.php" method="post" class="mt-5">
                    <div class="form-group">
                        <label for="cat">Category Name</label>
                        <input type="text" name="cat_name" id="cat" class="form-control">
                    </div>
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary mt-2 ">
                </form>
            </div>
        </div>
    </div>
</div>