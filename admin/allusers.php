<?php include "../admin/inc/header.php";
?>

<?php
$userHandler = new userHandler();
$getData = $userHandler->selectAlluser();
$x=1;
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="post-table">
                <div class="table-heading mt-3 mb-2">
                    <h1> All Users </h1>
                </div>
                <form action="allusers.php?id=<?php echo $getId ?>;" method=" post">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php if ($getData) { ?>
                            <?php while ($row = $getData->fetch_assoc()) { ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $x;
                                            $x++; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['role']; ?></td>
                                        <td>
                                            <a href="editusers.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                            <a href="allusers.php?delete=<?php echo $row['id']; ?>" class="btn btn-primary" name="delete">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        <?php } ?>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>