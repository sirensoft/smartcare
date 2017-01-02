<?php

use yii\helpers\Url;
use yii\web\JsExpression;
use yii\bootstrap\Modal;

$this->registerCss($this->render('custom.css'));
$this->registerCss($this->render('cursor.css'));
//$this->registerJs($this->render('click.js'));

$this->title = "CM...";
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนผู้ป่วย', 'url' => ['/patient']];
$this->params['breadcrumbs'][] = ['label' => 'ย้อนกลับ', 'url' => ['/patient/patient/view','pid'=>$pid]];
$this->params['breadcrumbs'][] = $pid;



$event_click = "
    function(calEvent, jsEvent, view) {   
        console.log(view.name);
        if(view.name!='month'){ 
            if (calEvent.url) return false;
        }
        if (calEvent.url) {  
            
            $('#modal').modal('show').find('#modalContent').load(calEvent.url);
            
            return false;
        }
         
    }
";



echo \yii2fullcalendar\yii2fullcalendar::widget(array(
    'events' => $events,
    'options' => [
        'lang' => 'th',
        'id' => 'calendar',
    ],
    'header' => [
        'center' => 'title',
        'right' => 'month,agendaWeek,listWeek,listDay',
        'left' => 'prev,next today'
    ],
    'clientOptions' => [
        'firstDay' => '1',
        'height' => new JsExpression('function(e){return $(window).height() - 100;}'),
        //'defaultView' => 'listWeek',
        'eventClick' => new JsExpression($event_click),
        'timeFormat' => 'H:mm',
        'eventLimit'=> true,
    ]
));


Modal::begin([
    'header' => 'เพิ่ม-แก้ไข แผนการดูแล',
    'size' => 'modal-lg',
    'id' => 'modal',
    
]);
echo "<div id='modalContent'></div>";

Modal::end();

$js= <<<JS
     $(document).on('click','.fc-day-number',function(){
    //$('.fc-day-number').click(function(){        
       var date = $(this).parent().attr('data-date');
       console.log(date);       
       $('#modal').modal('show').find('#modalContent').load('index.php?r=care/plan/create&start='+date+'&pid=$pid');
       return false;
    });      
JS;

$this->registerJs($js);






