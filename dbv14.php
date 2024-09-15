<?php
date_default_timezone_set("Asia/Phnom_Penh");
$cn = new mysqli("localhost", "root", "", "testdb");
$autoId = 1;
$status = "";

if (isset($_POST['btnSubmit'])) {
    echo "<h1>Open Connection</h1>";
    // $sql = "INSERT INTO tbl_test2 VALUES('', '10-10-10', 'Rean Web', 100)";

    $datePost = date("Y-m-d H:i:s A");
    $name = $_POST['txt-name'];
    $price = $_POST['txt-price'];
    // Check duplicate name
    $sql = "SELECT st_name FROM tbl_test2 WHERE st_name = '$name'";
    $result = $cn->query($sql);
    $num = $result->num_rows;
    if ($num == 0) {
        $sql = "INSERT INTO tbl_test2(date_payment, st_name, price) VALUES('$datePost', '$name', $price)";
        $cn->query($sql);
        $status = "<h1 style='color:green'>Success</h1>";
    } else {
        $status = "<h1 style='color:red'>Duplicate Name</h1>";
    }
}

// get autq
$sql = "SELECT MAX(id) as max_id FROM tbl_test2"; // use the same below
// $sql = "SELECT id FROM tbl_test2 ORDER BY id DESC";
$result = $cn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $autoId = $row['max_id'] + 1;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $status ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="dbv14.php" method="post">
        <label for="">ID</label>
        <input type="text" name="txt-id" id="id" readonly value="<?php echo $autoId++ ?>">
        <label for="">Student Name</label>
        <input type="text" name="txt-name" id="name">
        <label for="">Price</label>
        <input type="text" name="txt-price" id="price">
        <input type="submit" value="Save" name="btnSubmit">
    </form>
    <br>
    <table width='100%' border="1">
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Student Name</th>
            <th>Price</th>
        </tr>
        <?php
        $sql = "SELECT * FROM tbl_test2";
        $result = $cn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pay_date = date("d-M-Y H:i:s A", strtotime($row['date_payment']));

        ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $pay_date ?></td>
                    <td><?php echo $row['st_name'] ?></td>
                    <td><?php echo $row['price'] ?></td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
</body>

</html>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>