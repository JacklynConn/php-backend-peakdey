<?php
// open connection
$cn = new mysqli('localhost', 'root', '', 'php_backend_db');
if ($cn->connect_error) {
    die('Connection failed: ' . $cn->connect_error);
}
$lang = 1;
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
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
        <?php
            include('file/menu.php');
        ?>
        
        <div class="row">
            <div class="col-xl-12 col-lg-12 title1-box">
                <h1>Khmer Empire</h1>
                <p>Description</p>
            </div>
        </div>
        <!-- Item -->
        <?php
            include('file/item.php');
        ?>
    </div>
</body>

</html>