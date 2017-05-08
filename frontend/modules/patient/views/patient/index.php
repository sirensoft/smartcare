<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use common\components\MyHelper;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายชื่อผู้สูงอายุที่มีภาวะพึ่งพิง';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="patient-index">

        <?php // echo $this->render('_search', ['model' => $searchModel]);   ?>

    <p>
        <?php if (MyHelper::getUserRole() !== 3): ?>
            <?= Html::a('<i class="glyphicon glyphicon-map-marker"></i> แผนที่', ['/map'], ['class' => 'btn btn-blue', 'target' => '_blank']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-plus"></i> เพิ่ม', ['create'], ['class' => 'btn btn-green']) ?>
        
            <?= Html::a('<i class="glyphicon glyphicon-user"></i> จำหน่าย', ['index-discharge'], ['class' => 'btn btn-black pull-right']) ?>

    <?php endif; ?>
    </p>
    <?php
    $today = date('Y-m-d');
    $columns = [
        ['class' => 'yii\grid\SerialColumn'],
        
       
        //'disease',
        [
            'attribute' => 'color',
            'format'=>'html',
            'filter'=>['red'=>'red','yellow'=>'yellow','blue'=>'blue'],
            'value' => function($model) {
                    return Html::a('<i class="glyphicon glyphicon-search"></i>', ['/patient/patient/view', 'pid' => $model->id],['class'=>'btn btn-sm btn-default']);
                },
            'contentOptions' => function ($model) {
                if ($model->color == 'yellow') {
                    return ['style' => "color:black;background-color:$model->color;",'class' => 'text-center'];
                }
                return ['style' => "color:white;background-color:$model->color;",'class' => 'text-center'];
            },
            
        ],
        [
            'attribute'=>'class_name',
            'width'=>'120px'
            //'group'=>true,  // enable grouping,
            //'groupedRow'=>true,
            
        ],
               
        //'prename',
        [
            'attribute'=>'name',
            'width'=>'220px',
            'label'=>'ชื่อ-นามสกุล',
            'value'=>  function($model){
                return $model->prename.$model->name.' '.$model->lname;
            } 
        ],
        //'lname',
        [
            'attribute'=>'age_y',
            'label'=>'อายุ',
            'width'=>'100px',
            'format'=>'html',
            'value'=>function($model){
                return "<span class='badge'>$model->age_y ปี</span>";
            }
        ],
        //'age_y',
     
        'subdistrict',
        //'village_no',
         [
             'attribute'=>'village_no',
             'width'=>'100px'
         ],     
         [
            'attribute' => 'next_visit_date',
             'format'=>'date',
            'contentOptions' => function ($model) use ($today) {
                if ($model->next_visit_date == $today) {
                    return ['style' => "color:white;background-color:#f6546a;"];
                }
               
            }
        ],
         [
             'visible'=>  !MyHelper::isCg(),
             'attribute' => 'cg_id',
             'label' => 'ผู้ดูแล',
             'value' => 'user.u_name',
              //'group'=>true,
              //'groupedRow'=>true,  
                            
         ],
         [
             'attribute'=>'hospcode',
             'label'=>'หน่วยบริการ',
             'visible'=>  MyHelper::getUserRole()=='12'
         ]
     
    ];
              
                    ?>

                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'responsiveWrap' => false,
                        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
                        'columns' => $columns,
                        'panel'=>[
                            'before'=>''
                        ]
                    ]);
                    ?>
</div>
