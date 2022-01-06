<?php
include "../admin/inc/header.php";
// include "../helpers/functions.php";
?>
<?php
$id = $_GET['id'];
$userHandler = new userHandler();
$getPost = $userHandler->selectPost($id);
$getCat = $userHandler->selectAllcat();
if ($id != null && isset($_POST['update'])) {
    $updatePost = $userHandler->updatePost($id, $_POST['title'], $_POST['date'], $_POST['cat_name'], $_FILES['image']['name'], $_POST['body']);
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="add-post-form">

                <form action="editpost.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title" class="mt-2">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="<?php echo $getPost['title']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="date" class="mt-2">Select Date</label>
                        <input type="date" name="date" id="date" class="form-control" value="<?php echo $getPost['date']; ?>">
                    </div>
                    <div class="form-group my-2">
                        <label for="cat">Category</label>
                        <select name="cat_name" id="cat">
                            <option value="">Select Category</option>
                            <?php if ($getCat) {
                                while ($row = $getCat->fetch_assoc()) { ?>
                                    <option <?php echo $row['cat_name'] == $getPost['cat_name'] ? 'selected' : '' ?>><?php echo $row['cat_name']; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image" class="my-2">Upload Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        <img src="upload/<?php echo $row['image']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="mainpost" class="mt-2">Main Post</label>
                        <textarea name="body" id="mainpost" class="form-control">  <?php echo $getPost['body']; ?> </textarea>
                    </div>
                    <input type="submit" name="update" value="Update" class="btn btn-primary mt-2">
                </form>
            </div>
        </div>
    </div>
</div>