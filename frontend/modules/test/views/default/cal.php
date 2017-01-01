<?php
use yii\helpers\Url;
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนผู้ป่วย', 'url' => ['/patient']];
$this->params['breadcrumbs'][] = 'ทดสอบ';

$events = array();
//Testing
$Event = new \yii2fullcalendar\models\Event();
$Event->id = 1;
$Event->title = 'เปลี่ยนผ้าอ้อม';
$Event->start = '2016-11-20 09:00';
$events[] = $Event;

$Event = new \yii2fullcalendar\models\Event();
$Event->id = 2;
$Event->title = 'ทำความสะอาดสายยางให้อาหาร';
$Event->start = '2016-12-31 08:00:00';
$events[] = $Event;

$Event = new \yii2fullcalendar\models\Event();
$Event->id = 3;
$Event->title = 'ทำความสะอาดสายยางให้อาหาร';
$Event->start = '2016-12-30 08:00';
$Event->end = '2016-12-30 09:00';
$events[] = $Event;

$Event = new \yii2fullcalendar\models\Event();
$Event->id = 4;
$Event->title = 'ทำความสะอาดสายยางให้อาหาร';
$Event->start = '2016-12-30 09:00';
$Event->end = '2016-12-30 10:00';
$events[] = $Event;

$Event = new \yii2fullcalendar\models\Event();
$Event->id = 5;
$Event->title = 'เยี่ยมติดตามสุขภาพทั่วไป';
$Event->start = date('Y-m-d H:i');
$Event->url = Url::toRoute(['/site/index','cg'=>1,'id'=>2]) ;

$events[] = $Event;
?>

<?=

\yii2fullcalendar\yii2fullcalendar::widget(array(
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
         //'height'=>420
    //'defaultView'=>'listWeek',
    ]
));



$js = <<<JS
   
  
   function get_calendar_height() {
      return $(window).height() - 180;
   }

//attacht resize event to window and set fullcalendar height property
$(document).ready(function() {
    $(window).resize(function() {
        $('#calendar').fullCalendar('option', 'height', get_calendar_height());
    });


    //set fullcalendar height property
    $('#calendar').fullCalendar({   
            //options
            height: get_calendar_height
    });
});     
JS;

$this->registerJs($js);

