<?php
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
            
        ]
        /*[
            'label'=>'ADL',
            'value'=>$model[0]['adl_code']
        ],
        [
            'label'=>'HT',
            'value'=>$model[0]['ht_risk']
        ],
        [
            'label'=>'DM',
            'value'=>$model[0]['dm_risk']
        ],
        [
            'label'=>'CVD',
            'value'=>$model[0]['cvd_res']
        ],
        [
            'label'=>'ช่องปาก',
            'value'=>$model[0]['dent_code']
        ],
        [
            'label'=>'CVD',
            'value'=>$model[0]['cvd_res']
        ],
        [
            'label'=>'CVD',
            'value'=>$model[0]['cvd_res']
        ],*/
    ]
   
]);
