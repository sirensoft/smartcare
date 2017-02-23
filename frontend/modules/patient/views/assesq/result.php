<?php

use yii\data\ArrayDataProvider;
use kartik\grid\GridView;

$sql = " SELECT t.date_serv 'DATE_SERV',t.q2,t.q9,t.q8,t.note
,concat(u.u_prename,u.u_name,' ',u.u_lname) provider FROM assessment_q t 
LEFT JOIN `user` u on u.id = t.provider_id
WHERE  t.patient_id = '$pid' order by t.id DESC";

$raw = \Yii::$app->db->createCommand($sql)->queryAll();

$dataProvider = new ArrayDataProvider([
    'allModels' => $raw,
    'pagination' => [
        'pageSize' => 15
    ]
        ]);

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'responsiveWrap' => false,
    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'DATE_SERV:date:วันที่ประเมิน',
        'q2:text:2Q',
        'q9:text:9Q',
        'q8:text:8Q',
        'provider:text:ผู้ประเมิน',
        'note:text:หมายเหตุ'
    ]
]);


