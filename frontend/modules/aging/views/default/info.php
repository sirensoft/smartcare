<?php
use kartik\grid\GridView;
use yii\widgets\DetailView;
echo DetailView::widget([
    'model'=>$model[0],
    'attributes' => [
        'cid:text:เลข13หลัก',
        [
            'label'=>'ชื่อ-สกุล',
            'value'=>$model[0]['prename'].$model[0]['name'].' '.$model[0]['lname']. '('.$model[0]['age'].'ปี)'
        ],
        [
            'label'=>'ที่อยู่',
            'value'=>$model[0]['addr'].' หมู่ที่ '.$model[0]['moo'].' ต.'.$model[0]['tmb_name'].' อ.'.$model[0]['amp_name'].' จ.'.$model[0]['prov_name']
            
        ] ,
        [
            'label'=>'โรคประจำตัว',
            'value'=>$model[0]['dx']
        ]
    ]   
]);
?>

<?php

echo GridView::widget([
    'summary'=>'รายการ',
    'responsiveWrap' => false,
    'dataProvider' => $dataProvider,
    'columns'=>[
        'adl_code',        
        'dm_risk',
        'ht_risk',
        'cvd_score',
        'bmi'
    ]
]);
?>
