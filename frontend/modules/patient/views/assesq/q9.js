function cal8q() {
    var res = 0;
    var txt = 'ไม่มีแนวโน้มฆ่าตัวตายในปัจจุบัน';
    $("input[type=radio][data-q8]:checked").each(function (i, el) {
        res += parseInt($(el).val());
    });
    if(res>=1){
        txt = 'มีแนวโน้มที่จะฆ่าตัวตายในปัจจุบัน ระดับน้อย';
    }
    if(res>=9){
        txt='มีแนวโน้มที่จะฆ่าตัวตายในปัจจุบัน ระดับปานกลาง';
    }
    if(res>=17){
        txt='มีแนวโน้มที่จะฆ่าตัวตายในปัจจุบัน ระดับรุนแรง';
    }
    $("#q8_point_top").html(res+' '+txt)
    $("#q8_point_foot").html(res+' '+txt);
    $("#q8_score").val(res+'-'+txt);


}
$("input[type=radio][data-q8]").on("change", cal8q);