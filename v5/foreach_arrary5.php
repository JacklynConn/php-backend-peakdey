<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Arrays</title>
    <link rel="stylesheet" href="v5.css">
</head>

<body>
    <h1>Index Array</h1>

    <?php
    $colors = array("red", "green", "blue", "yellow");
    echo "I like " . $colors[0] . ", " . $colors[1] . " and " . $colors[2] . ".";
    echo "<br>";

    foreach ($colors as $value) {
    ?>
        <div class="box2" style="background-color: <?php echo $value ?>;">
            <?php echo $value; ?>
        </div>
    <?php
    }
    ?>

    <h1>Associative Array</h1>
    <?php
    $items = array("name" => "iphone", "price" => "1300", "color" => "black");
    echo "The " . $items["name"] . " is " . $items["color"] . " and costs " . $items["price"] . ".";

    // echo $Value;
    foreach ($items as $value) {
    ?>
        <div class="box2">
            <?php echo $value; ?>
        </div>
    <?php
    }

    // echo $value;
    foreach ($items as $key => $value) {
    ?>
        <div class="box2">
            <?php echo $key . ": " . $value; ?>
        </div>
    <?php
    }
    ?>
</body>

</html>