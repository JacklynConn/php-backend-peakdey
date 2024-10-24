$(document).ready(function () {
  var body = $("body");
  var popup = '<div class="popup"></div>';
  var frm = {"0" : "frm-category.php", "1" : "frm-news.php"};
  var frmOpt = 0;
  $(".btnAdd").click(function () {
    body.append(popup);
    body
      .find(".popup")
      .load("frm/" + frm[frmOpt], function (responseTxt, statusTxt, xhr) {
        if (statusTxt == "success")
            // body.find(".popup").show();
        if (statusTxt == "error")
          alert("Error: " + xhr.status + ": " + xhr.statusText);
      });
  });
  // left menu
  $('.left-menu').on('click', '.sub-menu li', function () {
    frmOpt = $(this).data('opt');
    $('.container').show();
  });
  // close popup
  body.on('click', '.frm .btn-close', function () {
    $('.popup').remove();
  });
  // save data
  body.on('click', '.frm .btnSave', function(){
    var eThis = $(this);
    var frm = eThis.closest('form.upl');
    var frm_data = new FormData(frm[0]);
    $.ajax({
      url: 'action/category.php',
      type: 'POST',
      data: frm_data,
      contentType: false,
      caches: false,
      processData: false,
      dataType: 'json',
      beforSend: function(){
        // frm.find('.btnSave').attr('disabled', 'disabled');
      },
      success: function(data){
       // console.log(data);
      }
    });
  });

});
