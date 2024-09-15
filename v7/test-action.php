<h1>PHP Action</h1>
<?php
    $file = $_FILES["text-file"];
    echo $file["name"]; // file name
    echo "<br>";
    echo $file["type"]; // file type
    echo "<br>";
    echo $file["size"]; // file size
    echo "<br>";
    echo $file["tmp_name"]; // temporary file name
    $ext = pathinfo($file["name"], PATHINFO_EXTENSION); // get file extension
    $img_name = rand(100000, 999999) . '-'.time(). '.' .$ext; // generate new file name
    $tmp_name = $file["tmp_name"]; 
    move_uploaded_file($tmp_name, '../img2/' . $img_name); // move file to new location
?>