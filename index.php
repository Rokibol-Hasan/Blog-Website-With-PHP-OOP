<?php include "init.php"; ?>
<?php
$userHandler = new userHandler();
$getData = $userHandler->selectAllPost();
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
}
?>
<section class="post-body">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php
                if ($getData) {
                    while ($row = $getData->fetch_assoc()) { ?>
                        <article class="blog-post">
                            <h2 class="blog-post-title"> <a href="singlepost.php?id=<?php echo $row['id']; ?>"> <?php echo $row['title']; ?> </h2>
                            <ul>
                                <li>
                                    <p class="blog-post-meta"><?php echo $row['date']; ?></p>
                                </li>
                                <li>
                                    <p class="blog-post-meta  mx-2"><?php echo $_SESSION['username']; ?></p>
                                </li>
                                <li>
                                    <p class="blog-post-meta mx-2"><?php echo $row['cat_name']; ?></p>
                                </li>
                            </ul>
                            <a href="#"><img style="height: 300px; weight:200px;" src="admin/upload/<?php echo $row['image']; ?>" alt="post image" /></a>
                            <p><?php echo $userHandler->textshorten($row['body']); ?></p>
                            <h6><a href="singlepost.php?id= <?php echo $row['id']; ?> "> Read More </a></h6>
                        </article>
                    <?php } ?>
                    <!-- end while loop -->
                    <!-- pagination -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link text-info" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link text-info" href="#">1</a></li>
                            <li class="page-item"><a class="page-link text-info" href="#">2</a></li>
                            <li class="page-item"><a class="page-link text-info" href="#">3</a></li>
                            <li class="page-item"><a class="page-link text-info" href="#">Next</a></li>
                        </ul>
                    </nav>
                    <!-- pagination -->
                <?php } ?>

            </div>
            <div class="col-md-4">
                <?php include "inc/sidebar.php"; ?>
            </div>
        </div>
    </div>
    <!-- footer section -->
    <?php include "inc/footer.php"; ?>
    </body>

    </html>