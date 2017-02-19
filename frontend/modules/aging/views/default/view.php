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
            'value'=>$model[0]['name'].' '.$model[0]['lname']
        ],
        [
            'label'=>'adl_code',
            'value'=>$model[0]['adl_code']
        ]
    ]
   
]);


