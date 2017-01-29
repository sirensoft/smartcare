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
            <?= Html::a('<i class="glyphicon glyphicon-map-marker"></i> แผนที่', ['/map'], ['class' => 'btn btn-warning', 'target' => '_blank']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-plus"></i> เพิ่ม', ['create'], ['class' => 'btn btn-success']) ?>
        
            <?= Html::a('<i class="glyphicon glyphicon-user"></i> จำหน่ายแล้ว', ['index-discharge'], ['class' => 'btn btn-default pull-right']) ?>

    <?php endif; ?>
    </p>
    <?php
    $today = date('Y-m-d');
    $columns = [
        ['class' => 'yii\grid\SerialColumn'],
        'class_name',
        //'disease',
        [
            'attribute' => 'color',
            'contentOptions' => function ($model) {
                if ($model->color == 'yellow') {
                    return ['style' => "color:black;background-color:$model->color;"];
                }
                return ['style' => "color:white;background-color:$model->color;"];
            }
                ],
                [
                    'attribute' => 'cid',
                    'format' => 'raw',
                    'value' => function($model) {
                        return Html::a($model->cid, ['/patient/patient/view', 'pid' => $model->id]);
                    }
                        ],
                        //'prename',
                        'name',
                        'lname',
                        'age_y',
                        //'birth',
                        // 'province',
                        // 'district',
                        'subdistrict',
                        'village_no',
                        // 'village_name',
                        'house_no',
                               
                        'next_visit_date'
                        
                            // 'typearea',
                            // 'nation',
                            // 'race',
                            // 'discharge',
                            // 
                            // 'dupdate',
                            //['class' => 'yii\grid\ActionColumn'],
                    ];
                    if (!MyHelper::isCg()) {
                        $columns[] = [
                            'attribute' => 'cg_id',
                            'label' => 'CG',
                            'value' => 'user.u_name',
                            'group'=>true,
                        ];
                    }
                    ?>

                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'responsiveWrap' => false,
                        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
                        'columns' => $columns,
                    ]);
                    ?>
</div>
