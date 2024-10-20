<div class="row">
    <div class="col-xl-12 col-lg-12 item-detail">
        <?php
        $sql = "SELECT title, img, des FROM tbl_city_item WHERE status=1 && lang=$lang && id=$itemId";
        $rs = $cn->query($sql);
        if ($rs->num_rows > 0) {
            $row = $rs->fetch_assoc();
        ?>
            <h1><?php echo $row['title']; ?></h1>
            <img src="../img-box/<?php echo $row['img']; ?>" alt="">
            <p><?php echo $row['des']; ?></p>
        <?php
        } else {
            echo '<h1>No Data!</h1>';
        }
        ?>
    </div>
</div>