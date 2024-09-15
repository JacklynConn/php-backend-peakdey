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
        $sql = "INSERT INTO tbl_test VALUES(2, 'PHP', 20.5)";
        // $cn->query($sql);
    ?>

    <h1>Update Data</h1>
    <?php
        $sql = "UPDATE tbl_test SET name = 'HTML', price = 25.5 WHERE id = 1";
        // $cn->query($sql);
    ?>

    <h1>Delete Data</h1>
    <?php
        $sql = "DELETE FROM tbl_test WHERE id = 1";
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
            $sql = "SELECT id, name, price FROM tbl_test where id = 1";
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

    <form action="">
        <label for="">ID</label>
        <input type="text" name="txt-id">
        <label for="">Student Name</label>
        <input type="text" name="txt-name">
        <label for="">Amount</label>
        <input type="text" name="txt-amount">
        <button type="submit" value="Save">Insert</button>
    </form>
</body>

</html>