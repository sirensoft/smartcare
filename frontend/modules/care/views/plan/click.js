$(function(){
    $(document).on('click','.fc-day-number',function(){
       //var date = $(this).attr('data-date') ;
       
       var date = $(this).parent().attr('data-date');
       //console.log(date);
       
       $('#modal').modal('show').find('#modalContent').load('index.php?r=care/plan/create&start='+date);
       return false;
    });   
    
      
});


