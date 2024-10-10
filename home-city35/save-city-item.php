<?php
    // open connection
    $cn = new mysqli('localhost', 'root', '', 'php_backend_db');
    if ($cn->connect_error) {
        die('Connection failed: ' . $cn->connect_error);
    }
    
    $city_id = $_POST['txt-city'];
    $title = $cn -> real_escape_string(trim($_POST['txt-city-item-name']));
    $des = str_replace("\n", "<br>", trim($_POST['txt-des']));
    $des = $cn -> real_escape_string($des);
    $lang = $_POST['txt-lang'];
    $img = $_POST['txt-photo'];
    $status = $_POST['txt-status'];

    $sql = "INSERT INTO tbl_city_item VALUES (null, '$city_id', '$title', '$des', '$lang', '$img', '$status')";
    $cn->query($sql);
?>
