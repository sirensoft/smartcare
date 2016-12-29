<?php
$events = array();
  //Testing
  $Event = new \yii2fullcalendar\models\Event();
  $Event->id = 1;
  $Event->title = 'Testing';
  $Event->start = date('Y-m-d\TH:i:s\Z');
  $events[] = $Event;

  $Event = new \yii2fullcalendar\models\Event();
  $Event->id = 2;
  $Event->title = 'Testing';
  $Event->start = date('Y-m-d\TH:i:s\Z',strtotime('tomorrow 6am'));
  $events[] = $Event;

  ?>

  <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
      'events'=> $events,
      'options' => [
        'lang' => 'th', 
          'id'=>'cal1'
        //'firstDay'=>'3'
      ],
      'clientOptions'=>[
          'firstDay'=>'1'
      ]
  ));
  
  