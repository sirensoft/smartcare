function cal2q() {
  var res = 0;
  $("input[type=radio][data-q2]:checked").each(function(i, el) {
    res += parseInt($(el).val());
  });
  var txt = "";
  if(res>0){
      txt = "เสี่ยง";
      $('#panel_q9').css('display','')
  }else{
      txt = "ปกติ";
       
  }
  $("#q2_point").html(txt)
  $("#q2_score").val(txt)

}
$("input[type=radio][data-q2]").on("change", cal2q);