<?php

use yii\helpers\Url;
use yii\web\JsExpression;
use yii\bootstrap\Modal;
use common\components\MyHelper;

$this->registerCss($this->render('custom.css'));
$this->registerCss($this->render('cursor.css'));
//$this->registerJs($this->render('click.js'));

$this->title = $model->prename . $model->name . " " . $model->lname;
$this->params['breadcrumbs'][] = ['label' => 'รายชื่อ', 'url' => ['/patient']];
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูล', 'url' => ['/patient/patient/view', 'pid' => $pid]];
$this->params['breadcrumbs'][] = 'แผนรายสัปดาห์';
?>
<div style="background-color:#ffc0cb;color: black; padding: 5px;margin-bottom: 5px">
    <?php
   echo "<b> ผู้สูงอายุ : " . $model->prename . $model->name . " " . $model->lname 
        ." - ". $model->age_y."ปี (".$model->class_name.")</b>";
    ?>
</div>

<?php


$cm_click = "
    function(calEvent, jsEvent, view) {   
        console.log(view.name);
        if(view.name!='month'){ 
            //if (calEvent.url) return false;
        }
        if (calEvent.url) {  
            
            $('#modal').modal('show').find('#modalContent').load(calEvent.url);
            
            return false;
        }
         
    }
";

$cg_click = "
    function(calEvent, jsEvent, view) {   
        console.log(view.name);        
        if(view.name!='listDay' && view.name!='listWeek' && view.name!='agendaWeek'){ 
            //if (calEvent.url) return false;
        }
        if (calEvent.url) {  
            
            $('#modal').modal('show').find('#modalContent').load(calEvent.url);
            
            return false;
        }
         
    }
";

$event_click = MyHelper::isCg() ? $cg_click : $cm_click;
?>

<?php

echo \yii2fullcalendar\yii2fullcalendar::widget(array(
    'events' => $events,
    'options' => [
        'lang' => 'th',
        //'locale'=>'en',
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
        'eventLimit' => true,
        'dayNamesShort' => ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
        'slotLabelFormat'=>'H:mm',
        //'minTime'=>'06:00'
    ]
));


Modal::begin([
    'header' => 'เพิ่ม-แก้ไข แผนการดูแล',
    'size' => 'modal-lg',
    'id' => 'modal',
]);
echo "<div id='modalContent'></div>";

Modal::end();

$js = <<<JS
     $(document).on('click','.fc-day-number',function(){
    //$('.fc-day-number').click(function(){        
       var date = $(this).parent().attr('data-date');
       console.log(date);       
       $('#modal').modal('show').find('#modalContent').load('index.php?r=care/plan-week/create&start='+date+'&pid=$pid');
       return false;
    });      
JS;
if (MyHelper::isCm()) {
    $this->registerJs($js);
}






