<?php

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
?>

<?=

\yii2fullcalendar\yii2fullcalendar::widget(array(
    'events' => $events,
    'options' => [
        'lang' => 'th',
        'id' => 'cal1'
    ],
    'header' => [
        'center' => 'title',
        'right' => 'month,agendaWeek,listWeek,listDay',
        'left' => 'prev,next today'
    ],
    'clientOptions' => [
        'firstDay' => '1',
    //'defaultView'=>'listWeek',
    ]
));

