<?php include "init.php"; ?>
<section class="post-body">
    <div class="container">
        <div class="row">
            <div class="col-md-8 card p-3">
                <?php
                $per_page = 3; // Ami per page e koyta value dekhabo sei number
                if (isset($_GET["page"])) { // checking current page, wheather i am in main page or another page.
                    $page = $_GET["page"]; // http://localhost/blog/index.php?page=2   1 2 3 4 5 6 7 8 9 10
                } else {
                    $page = 1;
                }
                $start_from = ($page - 1) * $per_page;
                ?>
                <?php
                $db = new Database();
                $userHandler = new userHandler();
                $query = "SELECT * FROM tbl_post LIMIT $start_from,$per_page";
                $post = $db->select($query);
                if ($post) {
                    while ($getData = $post->fetch_assoc()) {
                ?>
                        <article class="blog-post">
                            <h2 class="blog-post-title"> <a href="singlepost.php?id=<?php echo $getData['id']; ?>"> <?php echo $getData['title']; ?> </h2>
                            <ul>
                                <li>
                                    <p class="blog-post-meta"><?php echo $getData['date']; ?></p>
                                </li>
                                <li>
                                    <p class="blog-post-meta  mx-2"><?php echo $_SESSION['username']; ?></p>
                                </li>
                                <li>
                                    <p class="blog-post-meta mx-2"><?php echo $getData['cat_name']; ?></p>
                                </li>
                            </ul>
                            <a href="#"><img style="height: 300px; weight:200px;" src="admin/upload/<?php echo $getData['image']; ?>" alt="post image" /></a>
                            <p><?php echo $userHandler->textshorten($getData['body']); ?></p>
                            <h6><a href="singlepost.php?id= <?php echo $getData['id']; ?> "> Read More </a></h6>
                        </article>
                    <?php } ?>
                    <!-- end while loop -->
                    <!-- pagination -->
                    <?php
                    $userHandler = new userHandler();
                    $getData = $userHandler->selectAllPost();
                    $total_rows = mysqli_num_rows($getData);
                    $total_page = ceil($total_rows / $per_page); ?>
                    <nav aria-label="paginations">
                        <?php
                        echo "
                        <ul class='pagination'>
                        <a class='page-link' href='index.php?page=1'>" . 'First Page' . "</a>";
                        for ($i = 1; $i <= $total_page; $i++) {
                            echo "<li class='page-item'><a class='page-link' href='index.php?page=" . $i . "'>" . $i . "</a> </li>";
                        }
                        echo "<a class='page-link' href='index.php?page=$total_page'>" . 'Last Page' . "</a></ul>";
                        ?>
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