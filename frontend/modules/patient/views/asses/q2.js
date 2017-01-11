function cal2q() {
  var res = 0;
  $("input[type=radio][data-q2]:checked").each(function(i, el) {
    res += parseInt($(el).val());
  });
  var txt = "ปกติ";
  if(res>0){
      txt = "เสี่ยง";
  }
  $("#q2_point").html(txt)

}
$("input[type=radio][data-q2]").on("change", cal2q);