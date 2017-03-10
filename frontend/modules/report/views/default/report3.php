<?php
use yii\helpers\Html;
$c_year = \Yii::$app->db->createCommand("select c_year from c_year_process")->queryScalar();
$c_year = ($c_year*1)+543;

$this->title = 'รายงาน';
$this->params['breadcrumbs'][] = ['label' => 'รายงาน', 'url' => ['/report/']];
$this->params['breadcrumbs'][] = "รายงานความเคลื่อนไหว ADL ";


use kartik\grid\GridView;

echo GridView::widget([
    'responsiveWrap' => false,
    'dataProvider'=>$dataProvider,
    'filterModel'=>$searchModel,
    'panel'=>[
        'before'=>"<h4>ปี $c_year</h4>"
    ],
    'beforeHeader'=>[
        [
            'columns'=>[
                ['content'=>'', 'options'=>['colspan'=>1, 'class'=>'text-center warning']],
                ['content'=>'ผู้สูงอายุ', 'options'=>['colspan'=>5, 'class'=>'text-center warning']], 
                ['content'=>'ADL SCORE', 'options'=>['colspan'=>12, 'class'=>'text-center warning']],
                
            ],
            //'options'=>['class'=>'skip-export'] // remove this row from export
        ]
    ],
    'columns'=>[
        ['class' => 'yii\grid\SerialColumn',],
        [
            //'attribute' => 'cid',
                'label'=>' ',
                'format' => 'raw',
                'value' => function($model) {
                    $pid=$model['patient_id'];
                    return Html::a('<i class="glyphicon glyphicon-search"></i>', ['/patient/patient/view', 'pid' => $pid],['class'=>'btn btn-sm btn-info']);
                },
                'filter'=>FALSE
        ],
        'name:text:ชื่อ-สกุล',
        'age_y:integer:อายุ(ปี)',
        'moo:text:หมู่ที่',
        'class_name:text:กลุ่ม',
         'm01:text:ม.ค.',      
         'm02:text:ก.พ.',
         'm03:text:มี.ค.',
         'm04:text:เม.ย.',
         'm05:text:พ.ค.',
         'm06:text:มิ.ย.',
         'm07:text:ก.ค.',
         'm08:text:ส.ค.',
         'm09:text:ก.ย.',
         'm10:text:พ.ย.',
         'm11:text:ธ.ค.',
         
    ]
]);
