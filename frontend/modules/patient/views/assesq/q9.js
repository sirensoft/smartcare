function cal9q() {
    var res = 0;
    var txt = 'ไม่มีอาการของโรคซึมเศร้าหรือมีอาการของโรคซึมเศร้าระดับน้อยมาก';
    $("input[type=radio][data-q9]:checked").each(function (i, el) {
        res += parseInt($(el).val());
    });
    if(res>=7){
        txt = 'มีอาการของโรคซึมเศร้า ระดับน้อย';
    }
    if(res>=13){
        txt='มีอาการของโรคซึมเศร้า ระดับปานกลาง';
    }
    if(res>=19){
        txt='มีอาการของโรคซึมเศร้า ระดับรุนแรง';
    }
    $("#q9_point_top").html(res+' '+txt)
    $("#q9_point_foot").html(res+' '+txt);


}
$("input[type=radio][data-q9]").on("change", cal9q);