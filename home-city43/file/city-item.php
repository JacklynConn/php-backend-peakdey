<div class="row">
    <?php
    $city_id = $_GET['city_id'];
    $sql = "SELECT * FROM tbl_city_item WHERE status=1 && lang=$lang && city_id=$city_id";
    $rs = $cn->query($sql);
    while ($row = $rs->fetch_assoc()) {
    ?>
        <div class="col-xl-3 item-box">
            <div class="box">
                <div class="img-box">
                    <img src="../img-box/<?php echo $row['img']; ?>" alt="">
                </div>
                <div class="txt-box">
                    <h1><?php echo $row['title']; ?></h1>
                    <p><?php echo $row['des']; ?></p>
                    <a href="index.php?lang=<?php echo $lang; ?>&item_id=<?php echo $row['id']; ?>">
                        More...
                    </a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>