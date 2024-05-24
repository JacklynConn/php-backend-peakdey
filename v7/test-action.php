<h1>PHP Action</h1>
<?php
    $file = $_FILES["text-file"];
    echo $file["name"];
    echo "<br>";
    echo $file["type"];
    echo "<br>";
    echo $file["size"];
    echo "<br>";
    echo $file["tmp_name"];
    $ext = pathinfo($file["name"], PATHINFO_EXTENSION);
    $img_name = rand(100000, 999999) . '-'.time(). '.' .$ext;
    $tmp_name = $file["tmp_name"];
    move_uploaded_file($tmp_name, '../img2/' . $img_name);
?>