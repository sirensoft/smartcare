<?php

use kartik\tabs\TabsX;
use yii\helpers\Html;

$model = $dataProvider->getModels();
 if(empty($model)){
     throw new \yii\web\ForbiddenHttpException("ไม่พบในฐานข้อมูล 43 แฟ้ม / ไม่ใช่ประชากรในพื้นที่ (TYPE 2,4)");
            
 }


$this->title = ' รายละเอียด ';

$this->params['breadcrumbs'][] = ['label' => 'รายชื่อผู้สูงอายุทั้งหมดในพื้นที่รับผิดชอบ', 'url' => ['/aging/default/index']];
$this->params['breadcrumbs'][] = $model[0]['prename'] . $model[0]['name'] . ' ' . $model[0]['lname'] . '(' . $model[0]['age'] . 'ปี)';

$items = [
    [
        'label' => 'ข้อมูล',
        'content' => $this->render('info', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'i'=>$i
        ])
    ]   
];
if(!$i){
    $items[]= [
        'label' => 'คัดกรอง-ออนไลน์',
        'content' => '<div>ยังไม่เปิดใช้งาน</div>',
    ];
}

echo TabsX::widget([
    'items' => $items
]);
?>











