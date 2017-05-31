function cal(){
    var res=0;
    
    $("input[type=checkbox]:checked").each(function (i, el) {
        res += parseInt($(el).val());
    });
    if(res<=7){
        $("#res").html('คะแนน =  '+res+' แปลผล = ผิดปกติ (1B1221)');
        $('#amt_text').val('ผิดปกติ');
        $('#specialpp_code').val('1B1221');
    }else{
        $("#res").html('คะแนน =  '+res+' แปลผล = ปกติ (1B1220)');
         $('#amt_text').val('ปกติ');
        $('#specialpp_code').val('1B1220');
    }
    
}


$("input[type=checkbox]").on("change", cal);


