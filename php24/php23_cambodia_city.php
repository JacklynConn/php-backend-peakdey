<?php
$cn = new mysqli('localhost', 'root', '', 'php_backend_db');
$id = 1;
$sql = "SELECT id FROM tbl_city ORDER BY id DESC";
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
    <title>Cambodia City</title>
    <link rel="stylesheet" href="city23.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> -->

</head>

<body>
    <div class="frm">
        <div class="tl">
            <h1>Cambodia City</h1>
        </div>
        <form class="upl">
            <label for="">ID</label>
            <input type="text" name="txt-id" id="txt-id" class="frm-control" value="<?php echo $id ?>" readonly>
            <label for="">City Name</label>
            <input type="text" name="txt-name" id="txt-name" class="frm-control">
            <label for="">Description</label>
            <textarea name="txt-des" id="txt-des" class="frm-control"></textarea>
            <label for="">OD</label>
            <input type="text" name="txt-od" id="txt-od" class="frm-control" value="<?php echo $id; ?>">
            <label for="">Photo</label>
            <div class="img-box">
                <input type="file" name="txt-file" id="txt-file">
            </div>
            <input type="hidden" name="txt-photo" id="txt-photo">

            <div class="btnSave"><i class="fa-solid fa-floppy-disk"></i> Save</div>
    </div>
    <table>
        <tr>
            <th width="100">ID</th>
            <th width="200">City Name</th>
            <th>Description</th>
            <th width="100">OD</th>
            <th width="200">Photo</th>
            <th width="200">Action</th>
        </tr>
        <?php
        $sql = "SELECT * FROM tbl_city";
        $rs = $cn->query($sql);
        while ($row = $rs->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['city_name'] ?></td>
                <td><?php echo $row['city_des'] ?></td>
                <td><?php echo $row['od'] ?></td>
                <td><img src="../img-box/<?php echo $row['img'] ?>" alt=""></td>
                <td>
                    <a href="edit_city23.php?id=<?php echo $row['id'] ?>">Edit</a>
                    <a href="del_city23.php?id=<?php echo $row['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
<script>
    $(document).ready(function() {
        // upload image
        $('#txt-file').change(function() {
            var imgBox = $('.img-box');
            var loadingImag = "<div class='loading-img'></div>";
            var ethis = $(this);
            var frm = ethis.closest('form.upl');
            var frm_data = new FormData(frm[0]);
            $.ajax({
                url: 'upd-city-img23.php', // Update the URL to point to the save script
                type: 'POST',
                data: frm_data,
                contentType: false,
                processData: false,
                cache: false,
                dataType: 'json',
                beforeSend: function() {
                    imgBox.append(loadingImag);
                },
                success: function(data) {
                    alert(data['img_name']);
                    $(".img-box").css({
                        'background-image': 'url(../img-box/' + data['img_name'] + ')',
                    });
                    $('#txt-photo').val(data['img_name']);
                    imgBox.find('.loading-img').remove();
                },
            });
        });

        // save city
        $('.btnSave').click(function() {
            var ethis = $(this);
            var Parent = ethis.parents('.frm');
            var id = Parent.find('#txt-id');
            var name = Parent.find('#txt-name');
            var des = Parent.find('#txt-des');
            var od = Parent.find('#txt-od');
            var photo = Parent.find('#txt-photo');
            var imgBox = Parent.find('.img-box');
            var file = Parent.find('#txt-file');

            if (name.val() == '') {
                alert('Please input city name');
                name.focus();
                return;
            } else if (des.val() == '') {
                alert('Please input city description');
                des.focus();
                return;
            } else if (photo.val() == '') {
                alert('Please upload city photo');
                return;
            }
            var frm = ethis.closest('form.upl');
            var frm_data = new FormData(frm[0]);
            $.ajax({
                url: 'save_city23.php', // Update the URL to point to the save script
                type: 'POST',
                data: frm_data,
                contentType: false,
                processData: false,
                cache: false,
                dataType: 'json',
                beforeSend: function() {
                    ethis.html("<i class='fa-solid fa-floppy-disk'></i> Save");
                    ethis.css('pointer-events', 'none');
                },
                success: function(data) {
                    if (data['dpl'] == true) {
                        alert('City name is duplicate');
                        name.focus();
                        ethis.html("<i class='fa-solid fa-floppy-disk'></i> Save");
                        ethis.css('pointer-events', 'auto');
                        return;
                    } else {
                        alert(data['dpl'] ? 'City name is duplicate' : 'City is saved successfully');
                        id.val(data['last_id'] + 1);
                        od.val(data['last_id'] + 1);
                        name.val('');
                        des.val('');
                        name.focus();

                        photo.val('');
                        file.val('');
                        imgBox.css({
                            'background-image': 'url(../img/profile-img.jpg)',
                        });
                    }

                    ethis.html("<i class='fa-solid fa-floppy-disk'></i> Save");
                    ethis.css('pointer-events', 'auto');
                },
            });
        });
    });
</script>

</html>