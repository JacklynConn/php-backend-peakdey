<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 menu">
        <ul>
            <li>
                <a class="<?php echo $homeActive; ?>" href="index.php?lang=<?php echo $lang; ?>">
                    Home
                </a>
            </li>
            <?php
            $sql = "SELECT id, city_name FROM tbl_city WHERE status=1 && lang=$lang ORDER BY od";
            $rs = $cn->query($sql);
            while ($row = $rs->fetch_assoc()) {
                $active = '';
                if (isset($_GET['city_id']) && $_GET['city_id'] == $row['id']) {
                    $active = 'active';
                }
            ?>
                <li>
                    <a class="<?php echo $active; ?>" href="index.php?lang=<?php echo $lang; ?>&city_id=<?php echo $row['id']; ?>">
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