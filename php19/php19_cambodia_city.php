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
    <link rel="stylesheet" href="city19.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js">
    <script src="../jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

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
            <input type="file" name="txt-file" id="txt-file" class="frm-control">
            <div class="btnSave"><i class="fa-solid fa-floppy-disk"></i> Save</div>
        </form>
    </div>
</body>

<script>
    $(document).ready(function() {
        $('.btnSave').click(function() {
            var id = $('#txt-id').val();
            var name = $('#txt-name').val();
            var des = $('#txt-des').val();
            var od = $('#txt-od').val();
            var file = $('#txt-file').val();
            var data = new FormData();
            data.append('city-name', name);
            data.append('city-des', des);
            data.append('txt-od', od);
            data.append('txt-file', file);
            $.ajax({
                url: 'save_city19.php',
                type: 'POST',
                data: data,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    // var data = JSON.parse(response);
                    $('#txt-id').val(response['id'] + 1);
                    if (response.work == 'Working') {
                        alert('Save successfully');
                    } else {
                        alert('Save failed');
                    }
                }
            });
        });
    });
</script>

</html>