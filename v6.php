<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi Array</title>
    <link rel="stylesheet" href="v6.css">
</head>

<body>
    <h1>Multi Array</h1>
    <?php
    $items = array(
        array(
            "title" => "iphone 14", "price" => "1300", "color" => "black"
        ),
        array(
            "title" => "iphone 15", "price" => "1400", "color" => "white"
        ),
        array(
            "title" => "iphone 16", "price" => "1500", "color" => "red"
        )
    );

    echo $items[2]["title"];

    foreach ($items as $val) {
    ?>
    <div class="box2">
        <?php echo $val["title"] . " is " . $val["color"] . " and costs " . $val["price"] . "."; ?>
    </div>
    <?php
    }
    ?>

    <h1>
        String to Array
    </h1>
    <?php
    $imgList = "1.png,2.png,3.png,4.png,5.png,6.png";
    $imgs = explode(",", $imgList);
    foreach ($imgs as $img) {
    ?>
    <img src="img/<?php echo $img; ?>" alt="">
    <?php
    }
    ?>
    <img src="img/<?php echo $imgs[5]; ?>" alt="">
</body>

</html>