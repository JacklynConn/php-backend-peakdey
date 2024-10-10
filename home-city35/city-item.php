<?php
$cn = new mysqli('localhost', 'root', '', 'php_backend_db');
$id = 1;
$sql = "SELECT id FROM tbl_city_item ORDER BY id DESC";
$rs = $cn->query($sql);
if ($rs->num_rows > 0) {
    $row = $rs->fetch_array();
    $id = $row[0] + 1;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Item</title>
    <link rel="stylesheet" href="city.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../jquery.min.js"></script>
    <link rel="stylesheet" href="../bootstrap.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> -->

</head>

<body>
    <div class="frm">
        <div class="tl">
            <h1>Cambodia City Item</h1>
        </div>
        <form class="upl">
            <input type="hidden" name="txt-edit-id" id="txt-edit-id" value="0">
            <label for="">ID</label>
            <input type="text" name="txt-id" id="txt-id" class="frm-control" value="<?php echo $id ?>" readonly>
            <label for="">Language</label>
            <select name="txt-lang" id="txt-lang" class="frm-control">
                <option value="1">English</option>
                <option value="2">Khmer</option>
            </select>
            <label for="">City</label>
            <select name="txt-city" id="txt-city" class="frm-control">
                <option value="" hidden>Select City</option>
                <?php
                $sql = "SELECT id, city_name FROM tbl_city WHERE status = 1 ORDER BY id";
                $rs = $cn->query($sql);
                if ($rs->num_rows > 0) {
                    while ($row = $rs->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['city_name'] . "</option>";
                    }
                }
                ?>
            </select>
            <label for="">City Item Name</label>
            <input type="text" name="txt-city-item-name" id="txt-city-item-name" class="frm-control">
            <label for="">Description</label>
            <textarea name="txt-des" id="txt-des" class="frm-control"></textarea>
            <label for="">Status (0 = Disable, 1 = Enable)</label>
            <select name="txt-status" id="txt-status" class="frm-control">
                <option value="1">1</option>
                <option value="0">0</option>
            </select>
            <label for="">Photo</label>
            <div class="img-box">
                <input type="file" name="txt-file" id="txt-file">
            </div>
            <input type="hidden" name="txt-photo" id="txt-photo">
            <div class="btnSave"><i class="fa-solid fa-floppy-disk"></i> Save</div>
    </div>
    <table id="tbData">
        <tr class="trHead">
            <th width="100">ID</th>
            <th width="200">City Name</th>
            <th width="200">Title</th>
            <th>Description</th>
            <th width="50">Language</th>
            <th width="50">Status</th>
            <th width="200">Photo</th>
            <th width="200">Action</th>
        </tr>

        <?php
        // $sql = "SELECT * FROM tbl_city_item ORDER BY id DESC";
        // $sql = "SELECT tbl_city_item.*, tbl_city.city_name FROM tbl_city_item INNER JOIN tbl_city ON tbl_city_item.city_id = tbl_city.id ORDER BY id DESC"; // get all
        $sql = "SELECT tbl_city_item.id, 
                tbl_city.city_name, tbl_city_item.title, tbl_city_item.des, 
                tbl_city_item.lang, tbl_city_item.status, tbl_city_item.img 
                FROM tbl_city_item INNER JOIN tbl_city ON tbl_city_item.city_id =  tbl_city.id ORDER BY id DESC";
        $rs = $cn->query($sql);
        while ($row = $rs->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['city_name'] ?></td>
                <td><?php echo $row['title'] ?></td>
                <td><?php echo $row['des'] ?></td>
                <td><?php echo $row['lang'] ?></td>
                <td><?php echo $row['status'] ?></td>
                <td><img src="../img-box/<?php echo $row['img'] ?>" alt="<?php echo $row['img'] ?>"></td>
                <td>
                    <input type="button" value="Edit" class="btnEdit">
                    <input type="button" value="Delete" class="btnDel">
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div style="height: 300px;">

    </div>
</body>
<script>
    $(document).ready(function() {
        $('.btnSave').click(function() {
            var ethis = $(this);
            var frm = ethis.closest('form.upl');
            var frm_data = new FormData(frm[0]);
            $.ajax({
                url: 'save-city-item.php',
                type: 'POST',
                data: frm_data,
                contentType: false,
                processData: false,
                cache: false,
                dataType: 'json',
                beforeSend: function() {
                    // ethis.html('<i class="fa-solid fa-spinner-third"></i> Saving...');
                },
                success: function(data) {
                    // alert(data);
                }
            });
        });
    });
</script>

</html>