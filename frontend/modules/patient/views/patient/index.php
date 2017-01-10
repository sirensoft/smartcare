<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use common\components\MyHelper;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายชื่อผู้สูงอายุที่มีภาวะพึ่งพิง';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="patient-index">

    <?php if (\Yii::$app->session->hasFlash('sucess')): ?>
        <div class="alert alert-info alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>สวัสดี!</h4>
            <?= \Yii::$app->session->getFlash('sucess') ?>
        </div>
    <?php endif; ?>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php if (MyHelper::getUserRole() !== 3): ?>
            <?= Html::a('<i class="glyphicon glyphicon-map-marker"></i> แผนที่', ['/map'], ['class' => 'btn btn-warning', 'target' => '_blank']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-plus"></i> เพิ่ม', ['create'], ['class' => 'btn btn-success']) ?>

        <?php endif; ?>
    </p>
    <?php
    $columns = [
        ['class' => 'yii\grid\SerialColumn'],
        'class_name',
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
                            // 'typearea',
                            // 'nation',
                            // 'region',
                            // 'discharge',
                            // 'disease',
                            // 'dupdate',
                            //['class' => 'yii\grid\ActionColumn'],
                    ];
                    if (!MyHelper::isCg()) {
                        $columns[] = [
                            'attribute' => 'cg_id',
                            'label' => 'CG',
                            'value' => 'user.u_name',
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
