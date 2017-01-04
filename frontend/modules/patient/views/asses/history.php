<?php
use yii\data\ArrayDataProvider;
use kartik\grid\GridView;

$sql = " SELECT t.d_update 'DATE_SERV',t.adl_score,tai_score,t.tai_class,t.group_text,t.note
,concat(u.prename,u.`name`,' ',u.lname) provider FROM assessment t 
LEFT JOIN `user` u on u.id = t.provider_id
WHERE  t.patient_id = '$pid' order by t.id DESC";

$raw = \Yii::$app->db->createCommand($sql)->queryAll();

$dataProvider = new ArrayDataProvider([
    'allModels'=>$raw
]);

echo GridView::widget([
    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
    'dataProvider'=>$dataProvider,
    'columns'=>[
        ['class' => 'yii\grid\SerialColumn'],
        'DATE_SERV:datetime:วันที่ประเมิน',
        'adl_score:integer:ADL SCORE',
        'tai_score:integer:TAI SCORE',
        'tal_class:text:TAI CLASS',
        'group_text:text:กลุ่ม',
        'note:text:หมายเหตุ'
    ]
]);


