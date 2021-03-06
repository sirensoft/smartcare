<?php

use yii\helpers\Url;
use yii\web\JsExpression;
use yii\bootstrap\Modal;
use common\components\MyHelper;
use yii\helpers\Html;

$this->registerCss($this->render('custom.css'));
$this->registerCss($this->render('cursor.css'));
//$this->registerJs($this->render('click.js'));

$this->title = MyHelper::ptInfo_($pid);
$this->params['breadcrumbs'][] = ['label' => 'รายชื่อ', 'url' => ['/patient']];
$this->params['breadcrumbs'][] = ['label' => MyHelper::ptInfo_($pid), 'url' => ['/patient/patient/view', 'pid' => $pid]];
$this->params['breadcrumbs'][] = 'แผนรายสัปดาห์';
?>


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
        'defaultView' => 'month',
        'eventClick' => new JsExpression($event_click),
        'timeFormat' => 'H:mm',
        'eventLimit' => true,
        'dayNamesShort' => ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
        'slotLabelFormat' => 'H:mm',
        'minTime'=>'06:00',
        //'maxTime'=>'06:00'
    ]
));


Modal::begin([
    'header' => 'เพิ่ม-แก้ไข แผนการดูแล',
    'size' => 'modal-lg',
    'id' => 'modal',
]);
echo "<div id='modalContent'></div>";

Modal::end();
?>



<?php
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
?>






