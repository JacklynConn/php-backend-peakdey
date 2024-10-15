<?php
// open connection
$cn = new mysqli('localhost', 'root', '', 'php_backend_db');
if ($cn->connect_error) {
    die('Connection failed: ' . $cn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample1</title>
    <link rel="stylesheet" href="../bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <!-- Menu -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 menu">
                <ul>
                    <li>
                        <a href="#">
                            Home
                        </a>
                    </li>
                    <?php
                    $sql = "SELECT id, city_name FROM tbl_city WHERE status=1 ORDER BY od";
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
                </ul>
            </div>
        </div>

        <!-- Content -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 title1-box">
                <h1>Khmer Empire</h1>
                <p>Description</p>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 item-box">
                <div class="box">
                    <div class="img-box">
                        <img src="../img-box/22631-1726400234.jpg" alt="">
                    </div>
                    <div class="txt-box">
                        <h1>Phnom Penh</h1>
                        <p>Description</p>
                        <a href="">
                            More...
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 item-box">
                <div class="box">
                    <div class="img-box">
                        <img src="../img-box/22631-1726400234.jpg" alt="">
                    </div>
                    <div class="txt-box">
                        <h1>Phnom Penh</h1>
                        <p>Description</p>
                        <a href="">
                            More...
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 item-box">
                <div class="box">
                    <div class="img-box">
                        <img src="../img-box/22631-1726400234.jpg" alt="">
                    </div>
                    <div class="txt-box">
                        <h1>Phnom Penh</h1>
                        <p>Description</p>
                        <a href="">
                            More...
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 item-box">
                <div class="box">
                    <div class="img-box">
                        <img src="../img-box/22631-1726400234.jpg" alt="">
                    </div>
                    <div class="txt-box">
                        <h1>Phnom Penh</h1>
                        <p>Description</p>
                        <a href="">
                            More...
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>