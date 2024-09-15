<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambodia City</title>
    <link rel="stylesheet" href="city.css">
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
            <input type="text" name="city-id" id="city-id" class="frm-control">
            <label for="">City Name</label>
            <input type="text" name="city-name" id="city-name" class="frm-control">
            <label for="">Description</label>
            <textarea name="city-des" id="city-des" class="frm-control"></textarea>
            <label for="">OD</label>
            <input type="text" name="txt-od" id="txt-od" class="frm-control">
            <label for="">Photo</label>
            <input type="file" name="txt-file" id="txt-file" class="frm-control">
            <div class="btnSave"><i class="fa-solid fa-floppy-disk"></i> Save</div>
        </form>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('.btnSave').click(function() {
            // alert('Hello');
            var ethis = $(this);
            var frm = ethis.closest('form.upl');
            var frm_data = new FormData(frm[0]);

            $.ajax({
                url: 'save_city.php', // Update the URL to point to the save script
                type: 'POST',
                data: frm_data,
                contentType: false,
                processData: false,
                cache: false,
                dataType: 'json',
                beforeSend: function() {
                    // alert('Before Send');
                },
                success: function(response) {
                    // alert('Success');
                },
            });
        });
    });
</script>

</html>