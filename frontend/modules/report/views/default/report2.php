<?php

$this->title = 'รายงาน';
$this->params['breadcrumbs'][] = ['label' => 'รายงาน', 'url' => ['/report/']];
$this->params['breadcrumbs'][] = 'รายงานผลการดูแลรายคน';

use kartik\grid\GridView;

$columns =[
     ['class' => 'yii\grid\SerialColumn'],
    [
        'attribute'=>'color',
        'label'=>'สี',
        'contentOptions' => function ($model) {
                $color = $model['color'];
                if ($color == 'yellow') {
                    return ['style' => "color:black;background-color:$color;",'class' => 'text-center'];
                }
                return ['style' => "color:white;background-color:$color;",'class' => 'text-center'];
            }
    ],
    [
        'attribute'=>'name',
        'label'=>'ชื่อ-สกุล'
    ],
    [
        'attribute'=>'age_y',
        'label'=>'อายุ(ปี)'
    ],
    
    [
        'attribute'=>'class_name',
        'label'=>'กลุ่ม'
    ],
    [
        'attribute'=>'village_no',
        'label'=>'หมู่ที่'
    ],
    [
        'attribute'=>'house_no',
        'label'=>'บ้านเลขที่'
    ],
    [
        'attribute'=>'cg',
        'label'=>'CG'
    ],
    [
        'attribute'=>'count_visit',
        'label'=>'เยี่ยม(ครั้ง)'
    ],
    [
        'attribute'=>'last_visit',
        'label'=>'เยี่ยมล่าสุด'
    ],
    
];

echo GridView::widget([
    'panel'=>[
        'before'=>''
    ],
    'dataProvider' => $dataProvider,
    'responsiveWrap' => false,
    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
    'columns'=>$columns
]);

