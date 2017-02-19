<?php
use yii\widgets\DetailView;
$model = $dataProvider->getModels();


$this->title = ' รายละเอียด ';

$this->params['breadcrumbs'][] = ['label'=>'รายชื่อผู้สูงอายุทั้งหมดในพื้นที่รับผิดชอบ','url'=>['/aging']];
$this->params['breadcrumbs'][] = $this->title;

echo DetailView::widget([
    'model'=>$model[0],
    'attributes' => [
        'cid',
        [
            'label'=>'ชื่อ-สกุล',
            'value'=>$model[0]['prename'].$model[0]['name'].' '.$model[0]['lname']. '('.$model[0]['age'].'ปี)'
        ],
        [
            'label'=>'ADL',
            'value'=>$model[0]['adl_code'].' ('.$model[0]['adl_date'].')'
        ],
        [
            'label'=>'HT',
            'value'=>$model[0]['ht_risk'].' ('.$model[0]['ht_date'].')'
        ],
        [
            'label'=>'DM',
            'value'=>$model[0]['dm_risk'].' ('.$model[0]['dm_date'].')'
        ]
    ]
   
]);


