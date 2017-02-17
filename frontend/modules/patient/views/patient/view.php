<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;
use yii\bootstrap\ButtonGroup;
use common\components\MyHelper;
use yii\web\JsExpression;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Patient */

$this->title = MyHelper::ptInfo_($model->id);
$this->params['breadcrumbs'][] = ['label' => 'รายชื่อ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-view">


    <p>

        <?php if (MyHelper::isCm()): ?>
            <?= Html::a('<i class="glyphicon glyphicon-edit"></i> แก้ไข', ['update', 'pid' => $model->id], ['class' => 'btn btn-primary']) ?>

            <?= Html::a('<i class="glyphicon glyphicon-briefcase"></i> ประวัติ', ['/ehr/default/index', 'pids' => $model->id], ['class' => 'btn btn-danger','target'=>'_blank']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-plus"></i> ADL', ['/patient/asses/index', 'pid' => $model->id], ['class' => 'btn btn-brown']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-plus"></i> 2Q/9Q', ['/patient/assesq/index', 'pid' => $model->id], ['class' => 'btn btn-blue']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-calendar"></i> แผน', ['/care/plan/index', 'pid' => $model->id], ['class' => 'btn btn-deep-orange ']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-plus"></i> เยี่ยม', ['/care/visit/index', 'pid' => $model->id], ['class' => 'btn btn-green']) ?>

            <?= Html::a(' <i class="glyphicon glyphicon-signal"></i> ', ['/patient/chart/index', 'pid' => $model->id], ['class' => 'btn btn-default','target'=>'_blank']) ?>
            <?= Html::a(' <i class="glyphicon glyphicon-remove"></i> ', ['/patient/patient/discharge', 'pid' => $model->id], ['class' => 'btn btn-danger pull-right']) ?>
            
        <?php endif; ?>

        <?php if (MyHelper::isCg()): ?>
            <?= Html::a('<i class="glyphicon glyphicon-user"></i> ข้อมูล', ['/patient/logbook/index', 'pid' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-plus"></i> ADL', ['/patient/asses/index', 'pid' => $model->id], ['class' => 'btn btn-brown']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-plus"></i> 2Q/9Q', ['/patient/assesq/index', 'pid' => $model->id], ['class' => 'btn btn-blue']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-calendar"></i> แผน', ['/care/plan-week/index', 'pid' => $model->id], ['class' => 'btn btn-deep-orange ']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-plus"></i> เยี่ยม', ['/care/visit/index', 'pid' => $model->id], ['class' => 'btn btn-green']) ?>

        <?php endif; ?>
    </p>
    <?=
    DetailView::widget([
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
        'model' => $model,
        'condensed' => true,
        'hover' => true,
        'mode' => DetailView::MODE_VIEW,
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'attributes' => [
            [
                'group' => true,
                'label' => 'รายละเอียด',
                'rowOptions' => ['class' => 'info']
            ],
            'class_name',
            'adl',
            'tai',
            'cid',
            [
                'attribute'=>'fullname',
                'value'=>  MyHelper::ptInfo_($model->id)
            ],
            
            //'prename',
            //'name',
            //'lname',
            'fulladdr',
            //'province',
            //'district',
            //'subdistrict',
            //'village_no',
            //'village_name',
            //'house_no',
           'typearea',
            'nation',
            'race',
            'religion',
            'disease',
            
            'cousin',
            'tel',
            //'dupdate',
            [
                'attribute'=>'lat',
                'format'=>'raw',
                'label'=>'พิกัด',
                'value'=>  Html::a($model->lat.",".$model->lon,
                            ['/gate/go','url'=>"http://maps.google.com/?q=$model->lat,$model->lon"],['target'=>'_blank'])
                
                
            ],
            [
               'attribute'=>'discharge',
                'value'=>$model->discharge."-".$model->cdischarge->dischargedesc
            ],
            //'cdischarge.dischargedesc',
            'discharge_date:date',
            'discharge_note',
            [
                'attribute'=>'cg_id',
                'value'=>$model->user->u_prename.$model->user->u_name.' '.$model->user->u_lname
            ]
        ],
    ])
    ?>
    <p>
    <?php if (MyHelper::isCm()): ?>
        <?php
       
        echo Html::a('<i class="glyphicon glyphicon-minus"></i> ลบข้อมูล', ['delete', 'pid' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'ยืนยันการลบ!',                
                'method' => 'post',
            ],
        ])
        ?>
        <?php endif; ?>
    </p>

</div>
