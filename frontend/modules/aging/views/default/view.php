<?php

use kartik\tabs\TabsX;
$model = $dataProvider->getModels();


$this->title = ' รายละเอียด ';

$this->params['breadcrumbs'][] = ['label'=>'รายชื่อผู้สูงอายุทั้งหมดในพื้นที่รับผิดชอบ','url'=>['/aging']];
$this->params['breadcrumbs'][] = $this->title;
echo TabsX::widget([
    'items'=>[
        [
            'label'=>'ข้อมูล',
            'content'=>$this->render('info',[
                'model'=>$model
            ])
        ],
        [
            'label'=>'คัดกรอง-ออนไลน์',
            'content'=>'<div></div>'
        ]
    ]
]);




