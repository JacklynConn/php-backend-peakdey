<?php
date_default_timezone_set("Asia/Phnom_Penh");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="v1.css">
</head>

<body>
    <?php
    echo date("Y-m-d H:i:s");
    $x = 50;
    if ($x == 50) {
    ?>
        <div class="box1">

        </div>
    <?php
    } else {
    ?>
        <div class="box2">

        </div>
    <?php
    }
    ?>

    <h1>While Loop</h1>
    <?php
    $i = 1;
    while ($i < 5) {
    ?>
        <div class="box2">
            <?php echo $i; ?>
        </div>
    <?php
        $i++;
    }
    ?>

    <h1>For Loop</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        <?php
        for ($i = 1; $i < 5; $i++) {
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td>John Doe</td>
            </tr>
        <?php
        }
        ?>
    </table>
    <?php
    for ($i = 1; $i < 5; $i++) {
    ?>
        <div class="box2">
            <?php echo $i; ?>
        </div>
    <?php
    }
    ?>
</body>

</html>