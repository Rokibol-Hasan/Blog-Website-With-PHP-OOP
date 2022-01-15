<?php
$db = new Database();
$getData = $userHandler->selectAllcat();
$widget = "SELECT * FROM tbl_post LIMIT 5";
$result = $db->select($widget);
?>
<div class="position-sticky card p-2" style="top: 2rem; margin-top:20px;">
    <div class="p-4">
        <div class="sidebar widget">
            <h3>Recent Post</h3>
            <ul>
                <?php if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <li>
                            <div class="sidebar-thumb">
                                <img class="animated rollIn" src="admin/upload/<?php echo $row['image']; ?>" alt="post image" />
                            </div><!-- .Sidebar-thumb -->
                            <div class="sidebar-content">
                                <p class="animated bounceInRight"><a href="singlepost.php?id=<?php echo $row['id']?>"><?php echo $row['title']; ?></a></p>
                            </div><!-- .Sidebar-thumb -->
                            <div class="sidebar-meta">
                                <span class="time"><i class="fa fa-clock-o"></i><?php echo $row['date']; ?></span>
                            </div><!-- .Sidebar-meta ends here -->
                        </li>
                <?php }
                } ?>
                <!-- .Li ends here -->
            </ul><!-- .Ul ends how ends here -->
        </div><!-- .Container ends here -->
    </div>
    <div class="p-4 widget category">
        <ul class="list-unstyled list-group mb-0">
            <li class="list-group-item">
                <h4 class="">Catagories</h4>
            </li>
            <?php if ($getData) { ?>
                <?php while ($row = $getData->fetch_assoc()) { ?>
                    <li class="list-group-item"><a href="posts.php?category=<?php echo $row['cat_name'] ?>"><?php echo $row['cat_name']; ?></a></li>
                <?php } ?>
            <?php } ?>
        </ul>
    </div>
</div>