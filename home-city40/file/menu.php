<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 menu">
        <ul>
            <li>
                <a href="index.php">
                    Home
                </a>
            </li>
            <?php
            $sql = "SELECT id, city_name FROM tbl_city WHERE status=1 && lang=$lang ORDER BY od";
            $rs = $cn->query($sql);
            while ($row = $rs->fetch_assoc()) {
            ?>
                <li>
                    <a href="home-city.php?city_id=<?php echo $row['id']; ?>">
                        <?php echo $row['city_name']; ?>
                    </a>
                </li>
            <?php
            }
            ?>
            <li>
                <a href="index.php?lang=1">English</a>
            </li>
            <li>
                <a href="index.php?lang=2">Khmer</a>
            </li>
        </ul>
    </div>
</div>