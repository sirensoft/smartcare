<?php

$this->title = 'ชมรม ';
$this->params['breadcrumbs'][] = $this->title;

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;
?>

<p>
<?= Html::a('<i class="glyphicon glyphicon-plus"></i> เพิ่ม', '#', ['class' => 'btn btn-success']) ?>
</p>
<?php
$data =[
    [
        'name'=>'ชมรมผู้สูงอายุตำบลทดสอบ',
        'date'=>'2017-01-01',
        'member'=>'98'
    ]
];
$dataProvider = new ArrayDataProvider([
    'allModels'=>$data
]);

echo GridView::widget([
    'layout'=>'{items}',
    'responsiveWrap' => false,
    'dataProvider'=>$dataProvider,
    'columns'=>[
        ['class' => 'yii\grid\SerialColumn'],
        'name:text:ชื่อชมรม',
        'date:date:วันที่จัดตั้ง',
        'member:integer:สมาชิก(คน)'
        
    ]
]);

?>


