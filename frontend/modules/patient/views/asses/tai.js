function calTai() {
  var tai = 0;
  $("input[type=radio][data-tai]:checked").each(function(i, el) {
    tai += +$(el).data("tai");
  });
  $("#tai_point_top").html(tai)
  $("#tai_point_foot").html(tai);
}
$("input[type=radio][data-tai]").on("change", calTai);