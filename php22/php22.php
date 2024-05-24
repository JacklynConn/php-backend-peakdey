<?php 
    $cn = new mysqli('localhost', 'root', '', 'php_backend_db');
    $id = 1;
    $sql = "SELECT MAX(id) as id FROM tbl_city";
    $rs = $cn->query($sql);
    if ($rs->num_rows > 0)
        $row = $rs->fetch_array();
    $id = $row[0] + 1;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambodia City</title>
    <link rel="stylesheet" href="php22.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="../jquery.min.js"></script>

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
            <div class="btnSave"><i class="fa-solid fa-floppy-disk"></i> Save</div>
        </form>
    </div>
</body>
<script>
    $(document).ready(function(){
        // upload image
        $('#txt-file').change(function(){
            var ethis = $(this);
            var frm = ethis.closest('form.upl');
            var frm_data = new FormData(frm[0]);
            $.ajax({
                url: 'upd-city-img.php', // Update the URL to point to the save script
                type: 'POST',
                data: frm_data,
                contentType: false,
                processData: false,
                cache: false,
                // dataType: 'json',
                beforeSend:function(){
                   
                },
                success:function(data){
                    // alert(data['img_name']);
                    $(".img-box").css({
                        'background-image': 'url(../img/'+data['img_name']+')',
                    });
                },
            });
        });
        $('.btnSave').click(function(){
            var ethis = $(this);
            var Parent = ethis.parents('.frm');
            var id = Parent.find('#txt-id');
            var name = Parent.find('#txt-name');
            var des = Parent.find('#txt-des');
            var od = Parent.find('#txt-od');
            if(name.val() == ''){
                alert('Please input city name');
                name.focus();
                return;
            }else if(des.val() == ''){
                alert('Please input city description')`;
                des.focus();
                return;
            }
            var frm = ethis.closest('form.upl');
            var frm_data = new FormData(frm[0]);`
            $.ajax({
                url: 'save_city.php', // Update the URL to point to the save script
                type: 'POST',
                data: frm_data,
                contentType: false,
                processData: false,
                cache: false,
                dataType: 'json',
                beforeSend:function(){
                    ethis.html("<i class='fa fa-spinner fa-spin' style='font-size:24px'></i> wait...");
                    ethis.css('pointer-events', 'none');
                },
                success:function(data){
                if(data['dpl'] == true){
                    alert('City name is duplicate');
                    name.focus();
                    ethis.html("<i class='fa-solid fa-floppy-disk'></i> Save");
                    ethis.css('pointer-events', 'auto');
                    return;
                }else{
                    alert(data['dpl'] ? 'City name is duplicate' : 'City is saved successfully');
                    id.val(data['id'] + 1);
                    od.val(data['id'] + 1);
                    name.val('');
                    des.val('');
                    name.focus();
                }
                
                ethis.html("<i class='fa-solid fa-floppy-disk'></i> Save");
                ethis.css('pointer-events', 'auto');
                },
            });
            }
        });
    
    });
</script>
</html>
