<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Open Connection</h1>
    <?php
        $cn = new mysqli("localhost", "root", "", "php_backend_db");
    ?>
    <h1>Insert Data</h1>
    <?php 
        $sql = "INSERT INTO tbl_test VALUES(1, 'HTML', 10.5)";
        $cn->query($sql);
    ?>
</body>

</html>