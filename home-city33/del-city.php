<?php
     $cn = new mysqli('localhost', 'root', '', 'php_backend_db');
     if ($cn->connect_error) {
         die('Connection failed: ' . $cn->connect_error);
     }

     $id = $_POST['id'];
     $sql = "DELETE FROM tbl_city WHERE id = $id";
        $cn->query($sql);
        echo "Delete Success!";


?>