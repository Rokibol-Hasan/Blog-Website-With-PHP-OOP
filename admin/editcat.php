<?php include "inc/header.php";?>

<div class="container-fluid">
    <div class="row">
        <?php include "../admin/inc/indexnav.php"; ?>
        <div class="col-md-9">
            <div class="edit-cat-form">
                <?php
                $id = $_GET['id'];
                $userHandler = new userHandler();
                $getData = $userHandler->selectCat($id);
                if ($id != null && isset($_POST['update'])) {
                    $update = $userHandler->updateCat($id, $_POST['cat_name']);
                }
                ?>
                <form action="editcat.php?id=<?php echo $id; ?>" method="post" class="mt-5">
                    <div class="form-group">
                        <label for="cat">Cat Name</label>
                        <input type="text" name="cat_name" id="cat" class="form-control" value="<?php echo $getData['cat_name']; ?>">
                    </div>
                    <input type="submit" name="update" value="Update" class="btn btn-primary mt-2">
                </form>
            </div>
        </div>
    </div>
</div>
