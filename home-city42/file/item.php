<div class="row">
    <?php
        $sql = "SELECT * FROM tbl_city WHERE status=1 && lang=$lang";
        $rs = $cn->query($sql);
        while ($row = $rs->fetch_assoc()) {
        ?>
            <div class="col-xl-3 item-box">
                <div class="box">
                    <div class="img-box">
                        <img src="../img-box/<?php echo $row['img']; ?>" alt="">
                    </div>
                    <div class="txt-box">
                        <h1><?php echo $row['city_name']; ?></h1>
                        <p>
                            <?php
                                echo mb_substr($row['city_des'], 0, 100, 'UTF-8');
                             ?>
                        </p>
                        <a href="home-city.php?city_id=<?php echo $row['id']; ?>">
                            More...
                        </a>
                    </div>
                </div>
            </div>
        <?php
        }
    ?>
</div>