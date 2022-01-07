<?php
include "../admin/inc/header.php";
// include "../helpers/functions.php";
?>
<?php
$userHandler = new userHandler();
$addNewUser = $userHandler->addNewUser();
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="add-post-form">

                <form action="" method="post">
                    <div class="form-group">
                        <label for="username" class="mt-2">Username</label>
                        <input type="username" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email" class="mt-2">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="role">Role</label>
                        <select name="role" id="role">
                            <option value="">Select Role</option>
                            <option value="0">Normal User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password" class="my-2">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <input type="submit" name="submit" value="submit" class="btn btn-primary mt-2">
                </form>
            </div>
        </div>
    </div>
</div>