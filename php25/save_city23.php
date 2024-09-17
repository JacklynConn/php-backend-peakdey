<?php
    $cn = new mysqli('localhost', 'root', '', 'php_backend_db');
    if ($cn->connect_error) {
        die('Connection failed: ' . $cn->connect_error);
    }
    // $cn -> set_charset('utf8'); // set character set to utf8 to support khmer unicode
    $name = trim($_POST['txt-name']);
    $name = $cn->real_escape_string($name); // prevent sql injection example: ' OR 1=1 --
    $des = trim($_POST['txt-des']); // remove white space
    $des = str_replace("\n", "<br>", $des); // replace new line with <br>
    $img = $_POST['txt-photo'];
    $od = $_POST['txt-od'];

    // check duplicate city name
    $sql = "SELECT city_name FROM tbl_city WHERE city_name = '$name'";
    $rs = $cn->query($sql);
    $num = $rs->num_rows;
    $msg['dpl'] = false;
    if($num == 0){
        $sql = "INSERT INTO tbl_city VALUES (null, '$name', '$des', '$img', '$od')";
        $cn->query($sql);
        $msg['last_id'] = $cn -> insert_id;
        $msg['dpl'] = false;
    }else{
        $msg['dpl'] = true;
    }


    echo json_encode($msg);
?>