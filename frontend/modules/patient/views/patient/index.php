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
        
            <?= Html::a('<i class="glyphicon glyphicon-user"></i> จำหน่ายแล้ว', ['index-discharge'], ['class' => 'btn btn-black pull-right']) ?>

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
            //'group'=>true,  // enable grouping,
            
        ],
               
        //'prename',
        'name',
        'lname',
        'age_y',
     
        'subdistrict',
        'village_no',
     
         [
            'attribute' => 'next_visit_date',
             'format'=>'date',
            'contentOptions' => function ($model) use ($today) {
                if ($model->next_visit_date == $today) {
                    return ['style' => "background-color:#85f24e;"];
                }
               
            }
        ],
         [
             'visible'=>  !MyHelper::isCg(),
             'attribute' => 'cg_id',
             'label' => 'CG',
             'value' => 'user.u_name',
              //'group'=>true,
              //'groupedRow'=>true,  
                            
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
