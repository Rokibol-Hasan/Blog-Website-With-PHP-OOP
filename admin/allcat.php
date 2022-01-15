<?php include "inc/header.php";
?>
<?php

$userHandler = new userHandler();
$getData = $userHandler->selectAllcat();
$x = 1;

?>
<?php
if (isset($_GET['delete'])) {
    $getId = $_GET['delete'];
    $deleteCat = $userHandler->deleteCat($getId);
}
?>
<div class="container-fluid">
    <div class="row">
        <?php include "../admin/inc/indexnav.php"; ?>
        <div class="col-md-9 card my-3">
            <div class="post-table">
                <div class="table-heading mt-3 mb-2">
                    <h1> Total Category </h1>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Serial</th>
                            <th scope="col">Cat Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <?php if ($getData) { ?>
                        <?php while ($row = $getData->fetch_assoc()) { ?>
                            <tbody>
                                <tr>
                                    <td><?php echo  $x;
                                        $x++; ?></td>
                                    <td><?php echo $row['cat_name']; ?></td>
                                    <td>
                                        <a href="editcat.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                        <a href="allcat.php?delete=<?php echo $row['id']; ?>" class="btn btn-primary" name="delete">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php } ?>
                    <?php } ?>
                </table>
                <a href="addcat.php" class="btn btn-primary mt-2">Add New</a>
            </div>
        </div>
    </div>
</div>