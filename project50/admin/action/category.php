<?php
    $cn = new mysqli('localhost', 'root', '', 'php_backend_db1');
    if ($cn->connect_error) die('Connection failed: ' . $cn->connect_error);

    $sql = "INSERT INTO tbl_menu VALUES(null, 'Rean Web', '123.jpg', '1', '1')";
    $cn->query($sql); 
?>