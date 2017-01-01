<?php

use yii\helpers\Url;
use yii\web\JsExpression;
use yii\bootstrap\Modal;

$this->registerCss($this->render('custom.css'));


$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนผู้ป่วย', 'url' => ['/patient']];
$this->params['breadcrumbs'][] = 'ทดสอบ';

$events = array();
//Testing
$Event = new \yii2fullcalendar\models\Event();
$Event->id = 1;
$Event->title = 'เปลี่ยนผ้าอ้อม';
$Event->start = '2016-11-20 09:00:01';
$Event->backgroundColor = 'green';
$events[] = $Event;

$Event = new \yii2fullcalendar\models\Event();
$Event->id = 2;
$Event->title = 'ทำความสะอาดสายยางให้อาหาร';
$Event->start = '2016-12-31 08:00:00';
$Event->backgroundColor = 'orange';
$events[] = $Event;

$Event = new \yii2fullcalendar\models\Event();
$Event->id = 3;
$Event->title = 'ทำความสะอาดสายยางให้อาหาร';
$Event->start = '2016-12-30 08:00:30';
$Event->end = '2016-12-30 09:00';
$Event->backgroundColor = 'green';
$events[] = $Event;

$Event = new \yii2fullcalendar\models\Event();
$Event->id = 4;
$Event->title = 'ทำความสะอาดสายยางให้อาหาร';
$Event->start = '2016-12-30 09:00';
$Event->end = '2016-12-30 10:00';
$Event->color = '#ff00ff';
$events[] = $Event;

$Event = new \yii2fullcalendar\models\Event();
$Event->id = 5;
$Event->title = 'เยี่ยมติดตามสุขภาพทั่วไป';
$Event->start = date('Y-m-d H:i:s');
$Event->url = Url::toRoute(['/patient/patient/note', 'cg' => 1, 'id' => 2]);
$dt = new DateTime($Event->start);
$dat = $dt->format('Y-m-d');
if($dat == date("Y-m-d")){
    $Event->color = 'red';
}

$events[] = $Event;


$expression_click = "
    function(calEvent, jsEvent, view) {        
        if(view.name!='listDay'){ 
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
        'defaultView' => 'listWeek',
        'eventClick' => new JsExpression($expression_click),
        'timeFormat' => 'H:mm',
    ]
));


Modal::begin([
    'header' => 'บันทึกข้อมูลการดูแล',
    'size' => 'modal-lg',
    'id' => 'modal'
]);
echo "<div id='modalContent'></div>";

Modal::end();




