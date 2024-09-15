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
        $cn = new mysqli("localhost", "root", "", "testdb");
    ?>
    <h1>Insert Data</h1>
    <?php 
        $sql = "INSERT INTO tbl_test VALUES(1, 'HTML', 10.5)";
        // $cn->query($sql);
    ?>
    <h1>Select Data</h1>
    <table width="100%" border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
        <?php
            $sql = "SELECT id, name, price FROM tbl_test where id = 1"; // select specific data
            $sql = "SELECT * FROM tbl_test";
            $rs = $cn->query($sql);
            while($row = $rs->fetch_array()){
                ?>
                <tr>
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[2]; ?></td>
                </tr>
                <?php
            }
        ?>
    </table>
    <!-- <?php
        $sql = "SELECT * FROM tbl_test";
        $rs = $cn->query($sql);
        // $row = $rs->fetch_array();
        while($row = $rs->fetch_array()){
            echo $row[0] . " " . $row[1] . " " . $row[2] . "<br>";
        }
    ?> -->
</body>

</html>