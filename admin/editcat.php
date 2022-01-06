<?php include "../admin/inc/header.php";
// include "../helpers/functions.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="edit-cat-form">
                <?php
                $id = $_GET['id'];
                $userHandler = new userHandler();
                $getData = $userHandler->selectCat($id);
                if ($id != null && isset($_POST['update'])) {
                    $update = $userHandler->updateCat($id,$_POST['cat_name']);
                }
                ?>
                <form action="editcat.php?id=<?php echo $id; ?>" method="post" class="mt-5">
                    <div class="form-group">
                        <label for="cat">Cat Name</label>
                        <input type="text" name="cat_name" id="cat" class="form-control" value="<?php echo $getData['cat_name'];?>">
                    </div>
                    <input type="submit" name="update" value="Update" class="btn btn-primary mt-2">
                </form>
            </div>
        </div>
    </div>
</div>