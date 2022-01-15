<?php
include "inc/header.php";
?>
<section class="post-body">
    <div class="container">
        <div class="row">
            <div class="col-md-8 card p-3">
                <?php
                $userHandler = new userHandler();
                if (isset($_GET['category'])) {
                    $catName = $_GET['category'];
                }
                $row = $userHandler->selectPostByCat($catName);
                ?>

                <?php if ($row->num_rows > 0) {
                    while ($getData = $row->fetch_assoc()) {
                ?>
                        <article class="blog-post">
                            <h2 class="blog-post-title"> <a href="singlepost.php?id=<?php echo $getData['id']; ?>"> <?php echo $getData['title']; ?> </h2>
                            <ul>
                                <li>
                                    <p class="blog-post-meta"><?php echo $getData['date']; ?></p>
                                </li>
                                <li>
                                    <p class="blog-post-meta mx-2"><?php echo $getData['cat_name']; ?></p>
                                </li>
                            </ul>
                            <a href="#"><img style="height: 300px; weight:200px;" src="admin/upload/<?php echo $getData['image']; ?>" alt="post image" /></a>
                            <p><?php echo $userHandler->textshorten($getData['body']); ?></p>
                            <h6><a href="singlepost.php?id= <?php echo $getData['id']; ?> "> Read More </a></h6>
                        </article>
                <?php }
                } else {
                    header("Location:404.php");
                    // echo "<script>alert('There is no post in this category')</script>";
                }
                ?>

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