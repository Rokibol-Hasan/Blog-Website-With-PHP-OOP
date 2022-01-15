<?php include "../admin/inc/header.php";
?>
<?php
$userHandler = new userHandler();
$getData = $userHandler->selectAllpost();
$x = 1;
?>
<?php
if (isset($_GET['delete'])) {
    $getId = $_GET['delete'];
    $deletePost  = $userHandler->deletePost($getId);
}
?>
<div class="container-fluid">
    <div class="row">
        <?php include "../admin/inc/indexnav.php"; ?>
        <div class="col-md-9 card my-3">
            <div class="post-table">
                <div class="table-heading mt-3 mb-2">
                    <h1> Total Posts </h1>
                </div>
                <form action="allpost.php?id=<?php echo $getId ?>;" method=" post">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">Post Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php if ($getData) { ?>
                            <?php while ($row = $getData->fetch_assoc()) { ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $x;
                                            $x++; ?></td>
                                        <td><?php echo $row['title']; ?></td>
                                        <td><?php echo $row['cat_name']; ?></td>
                                        <td>
                                            <a href="editpost.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                            <a href="allpost.php?delete=<?php echo $row['id']; ?>" class="btn btn-primary" name="delete">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        <?php } ?>
                    </table>
                    <a href="addpost.php" class="btn btn-primary">Add New</a>
                </form>
            </div>
        </div>
    </div>
</div>