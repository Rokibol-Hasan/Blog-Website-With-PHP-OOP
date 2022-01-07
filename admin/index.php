<?php include "../admin/inc/header.php"; ?>
<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column card">
                    <li class="nav-item list-group-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <span data-feather="home"></span>
                            Dashboard
                        </a>
                    </li>

                    <?php
                    if (($_SESSION['role']) == '1') { ?>
                        <li class="nav-item list-group-item">
                            <a class="nav-link" href="allusers.php">
                                <span data-feather="file"></span>
                                All Users
                            </a>
                        </li>
                        <li class="nav-item list-group-item">
                            <a class="nav-link" href="adduser.php">
                                <span data-feather="file"></span>
                                Add New User
                            </a>
                        </li>
                    <?php  } ?>


                    <li class="nav-item list-group-item">
                        <a class="nav-link" href="allpost.php">
                            <span data-feather="file"></span>
                            All Posts
                        </a>
                    </li>
                    <li class="nav-item list-group-item">
                        <a class="nav-link" href="addpost.php">
                            <span data-feather="file"></span>
                            Add Post
                        </a>
                    </li>
                    <li class="nav-item list-group-item">
                        <a class="nav-link" href="allcat.php">
                            <span data-feather="file"></span>
                            All Categories
                        </a>
                    </li>
                    <li class="nav-item list-group-item">
                        <a class="nav-link" href="addcat.php">
                            <span data-feather="file"></span>
                            Add Categories
                        </a>
                    </li>
            </div>
        </nav>
        <div class="col-md-3 mt-5">

        </div>
        <div class="col-md-3 mt-5">
            <h4>Edit Links</h4>
        </div>
        <div class="col-md-4 mt-5">
            <h4>Average Updates</h4>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Cras justo odio
                    <span class="badge badge-primary badge-pill">14</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Dapibus ac facilisis in
                    <span class="badge badge-primary badge-pill">2</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Morbi leo risus
                    <span class="badge badge-primary badge-pill">1</span>
                </li>
            </ul>
        </div>
    </div>
</div>


<script src="/docs/5.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script src="dashboard.js"></script>
</body>

</html>