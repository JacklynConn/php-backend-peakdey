<?php
    $cn = new mysqli('localhost', 'root', '', 'php_backend_db');
    if ($cn->connect_error) {
        die('Connection failed: ' . $cn->connect_error);
    }
    
    $city_name = $_POST['city-name'];
    $city_des = $_POST['city-des'];
    $img = '123.jpg';
    $od = $_POST['txt-od'];
    $sql = "INSERT INTO tbl_city VALUES(null, '$city_name', '$city_des', '$img', '$od')";
    $cn->query($sql);
    $msg['work'] = 'Working';
    $msg['id'] = $cn->insert_id;

    echo json_encode($msg);
?>