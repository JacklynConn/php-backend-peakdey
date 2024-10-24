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

});
