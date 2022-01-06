
<?php $getData = $userHandler->selectAllcat();?>
<div class="position-sticky" style="top: 2rem; margin-top:20px;">
    <div class="p-4 mb-3 bg-light rounded">
        <h4 class="fst-italic">About</h4>
        <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
    </div>


    <div class="p-4 category">
        <h4 class="fst-italic">Catagories</h4>
        <ul class="list-unstyled mb-0">
            <?php if ($getData) { ?>
                <?php while ($row = $getData->fetch_assoc()) { ?>
                    <li><a href="#"><?php echo $row['cat_name']; ?></a></li>
                <?php } ?>
            <?php } ?>
        </ul>

    </div>


    <div class="p-4">
        <h4 class="fst-italic">Share to</h4>
        <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
        </ol>
    </div>
</div>