<?php
date_default_timezone_set("Asia/Phnom_Penh");
$cn = new mysqli("localhost", "root", "", "testdb");
$autoId = 1;

if (isset($_POST['btnSubmit'])) {
    echo "<h1>Open Connection</h1>";
    // $sql = "INSERT INTO tbl_test2 VALUES('', '10-10-10', 'Rean Web', 100)";

    $datePost = date("Y-m-d H:i:s A");
    $name = $_POST['txt-name'];
    $price = $_POST['txt-price'];
    $sql = "INSERT INTO tbl_test2(date_payment, st_name, price) VALUES('$datePost', '$name', $price)";
    $cn->query($sql);
}

// get auto id
// $sql = "SELECT MAX(id) as max_id FROM tbl_test2"; // use the same below
$sql = "SELECT id FROM tbl_test2 ORDER BY id DESC";
$result = $cn->query($sql);
$num = $result->num_rows;
if ($num > 0) {
    $row = $result->fetch_array();
    $autoId = $row['id'] + 1;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="dbv13.php" method="post">
        <label for="">ID</label>
        <input type="text" name="txt-id" id="id" readonly value="<?php echo $autoId++ ?>">
        <label for="">Student Name</label>
        <input type="text" name="txt-name" id="name">
        <label for="">Price</label>
        <input type="text" name="txt-price" id="price">
        <input type="submit" value="Save" name="btnSubmit">
    </form>
</body>

</html>
<script>
    if(window.history.replaceState){
        window.history.replaceState(null, null, window.location.href);
    }
</script>