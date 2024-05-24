
<?php
    date_default_timezone_set("Asia/Phnom_Penh");
    echo "<h1>Open Connection</h1>";
    $cn = new mysqli("localhost", "root", "", "php_backend_db");
    // $sql = "INSERT INTO tbl_test2 VALUES('', '10-10-10', 'Rean Web', 100)";

    $datePost = date("Y-m-d H:i:s A");
    $name = $_POST['txt-name'];
    $price = $_POST['txt-price'];
    $sql = "INSERT INTO tbl_test2(date_payment, st_name, price) VALUES('$datePost', '$name', $price)";
    $cn->query($sql);
?>
