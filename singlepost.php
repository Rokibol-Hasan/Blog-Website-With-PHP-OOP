<?php include "init.php"; ?>
<?php
$id = $_GET['id'];
$userHandler = new userHandler();
if ($id != null && isset($_GET['id'])) {
    $getData = $userHandler->selectPost($id);
}
?>
<section class="post-body">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php
                if ($getData) { ?>
                        <article class="blog-post">
                            <h2 class="blog-post-title"><?php echo $getData['title']; ?> </h2>
                            <p class="blog-post-meta"><?php echo $getData['date']; ?></p>
                            <a href="#"><img style="height: 300px; weight:200px;" src="admin/upload/<?php echo $getData['image']; ?>" alt="post image" /></a>
                            <p><?php echo ($getData['body']); ?></p>
                        </article>
                <?php } ?>
            </div>
            <div class="col-md-4">
                <?php include "inc/sidebar.php"; ?>
            </div>
        </div>
    </div>
</section>
<!-- footer section -->
<?php include "inc/footer.php"; ?>
</body>

</html>