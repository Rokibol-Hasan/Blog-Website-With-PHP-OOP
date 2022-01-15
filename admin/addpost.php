<?php include "inc/header.php";
$userHandler = new userHandler();
$insertPost = $userHandler->insertPost();
$getCat = $userHandler->selectAllcat();
?>
<div class="container-fluid">
    <div class="row">
        <?php include "../admin/inc/indexnav.php"; ?>
        <div class="col-md-9 card my-3">
            <div class="add-post-form">
                <form action="addpost.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="date">Select Date</label>
                        <input type="date" name="date" id="date" class="form-control">
                    </div>

                    <div class="form-group  my-2">
                        <label for="cat">Category</label>
                        <select name="cat_name" id="cat">
                            <option selected value="">Select Category</option>
                            <?php if ($getCat) { ?>
                                <?php while ($row = $getCat->fetch_assoc()) { ?>
                                    <option><?php echo $row['cat_name']; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image" class="my-2">Upload Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="mainpost">Main Post</label>
                        <textarea name="body" id="mainpost" class="form-control">  </textarea>
                    </div>
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary mt-2">
                </form>
            </div>
        </div>
    </div>
</div>