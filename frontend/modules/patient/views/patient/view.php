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
            <?= Html::a('<i class="glyphicon glyphicon-plus"></i> ADL', ['/patient/asses/index', 'pid' => $model->id], ['class' => 'btn btn-success']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-plus"></i> 2Q/9Q', ['/patient/assesq/index', 'pid' => $model->id], ['class' => 'btn btn-info']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-calendar"></i> แผน', ['/care/plan/index', 'pid' => $model->id], ['class' => 'btn btn-warning ']) ?>

            <?= Html::a('<i class="glyphicon glyphicon-print"></i> พิมพ์', ['/patient/print/index', 'pid' => $model->id], ['class' => 'btn btn-default']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> จำหน่าย', ['/patient/patient/discharge', 'pid' => $model->id], ['class' => 'btn btn-danger pull-right']) ?>
            
        <?php endif; ?>

        <?php if (MyHelper::isCg()): ?>
            <?= Html::a('<i class="glyphicon glyphicon-user"></i> ข้อมูล', ['/Profile/', 'pid' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-plus"></i> ADL', ['/patient/asses/index', 'pid' => $model->id], ['class' => 'btn btn-danger']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-plus"></i> 2Q/9Q', ['/patient/assesq/index', 'pid' => $model->id], ['class' => 'btn btn-info']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-calendar"></i> แผน', ['/care/plan-week/index', 'pid' => $model->id], ['class' => 'btn btn-warning ']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-plus"></i> เยี่ยม', ['/care/visit/index', 'pid' => $model->id], ['class' => 'btn btn-success']) ?>

        <?php endif; ?>

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
            'fullname',
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
            'discharge_date',
            'discharge_note',
        ],
    ])
    ?>
    <p>
    <?php if (MyHelper::isCm()): ?>
        <?php
       
        echo Html::a('<i class="glyphicon glyphicon-minus"></i> ลบ', ['delete', 'pid' => $model->id], [
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
