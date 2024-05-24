<?php
    include("header.php");
?>
<body>
    <?php
        include("menu.php");
    ?>
    <form action="test-action.php" method="post" enctype="multipart/form-data">
        <input type="text" name="name" id="name">
        <input type="file" name="text-file">
        <input type="submit" value="Submit">
    </form>
</body>
</html>