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




    <?php if (MyHelper::isCm()): ?>
        <?= Html::a('<i class="glyphicon glyphicon-edit"></i> แก้ไข', ['update', 'pid' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('<i class="glyphicon glyphicon-briefcase"></i> ประวัติ', ['/ehr/default/index', 'pids' => $model->id], ['class' => 'btn btn-danger', 'target' => '_blank']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-briefcase"></i> อุปกรณ์', ['/meddevice/med-device/index', 'pid' => $model->id], ['class' => 'btn btn-orange']) ?>
        <div class="btn-group">
            <button type="button" class="btn btn-blue"><i class="glyphicon glyphicon-check"></i> ประเมิน</button>
            <button type="button" class="btn btn-blue dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li>
                    <?= Html::a('<i class="glyphicon glyphicon-list-alt"></i> ประเมิน ADL', ['/patient/asses/index', 'pid' => $model->id], ['class' => '']) ?>

                </li>
                <li>
                    <?= Html::a('<i class="glyphicon glyphicon-list-alt"></i> ประเมิน 2Q/9Q', ['/patient/assesq/index', 'pid' => $model->id], ['class' => '']) ?>

                </li>                
                <li>
                    <?= Html::a('<i class="glyphicon glyphicon-list-alt"></i> ทดสอบสมอง', ['/patient/amt/index', 'pid' => $model->id], ['class' => '']) ?>
                </li>
                <li>
                    <?= Html::a('<i class="glyphicon glyphicon-list-alt"></i> ภาวะหกล้ม', ['/patient/tugt/index', 'pid' => $model->id], ['class' => '']) ?>
                </li>
                <li class="divider"></li>
                 <li>
                    <?= Html::a('<i class="glyphicon glyphicon-menu-hamburger"></i> สรุปผล', ['/aging/default/view', 'cid' => $model->cid,'i'=>'1'], ['class' => '','target'=>'_blank']) ?>                     
                </li>
            </ul>
        </div>
        <?= Html::a('<i class="glyphicon glyphicon-calendar"></i> แผน', ['/care/plan/index', 'pid' => $model->id], ['class' => 'btn btn-deep-orange ']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> เยี่ยม', ['/care/visit/index', 'pid' => $model->id], ['class' => 'btn btn-green']) ?>

        <?= Html::a(' <i class="glyphicon glyphicon-signal"></i> ', ['/patient/chart/index', 'pid' => $model->id], ['class' => 'btn btn-pink pull-right', 'target' => '_blank']) ?>

    <?php endif; ?>

    <?php if (MyHelper::isCg()): ?>
        <?= Html::a('<i class="glyphicon glyphicon-user"></i> ข้อมูล', ['/patient/logbook/index', 'pid' => $model->id], ['class' => 'btn btn-primary','style'=>'display:none']) ?>
        <div class="btn-group">
            <button type="button" class="btn btn-blue"><i class="glyphicon glyphicon-check"></i> ประเมิน</button>
            <button type="button" class="btn btn-blue dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li>
                    <?= Html::a('<i class="glyphicon glyphicon-list-alt"></i> กิจวัตรประจำวัน', ['/patient/asses/index', 'pid' => $model->id], ['class' => '']) ?>

                </li>
                <li>
                    <?= Html::a('<i class="glyphicon glyphicon-list-alt"></i> สุขภาพจิต', ['/patient/assesq/index', 'pid' => $model->id], ['class' => '']) ?>

                </li>
            </ul>
        </div>
        <?= Html::a('<i class="glyphicon glyphicon-calendar"></i> แผน', ['/care/plan-week/index', 'pid' => $model->id], ['class' => 'btn btn-deep-orange ']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> เยี่ยม', ['/care/visit/index', 'pid' => $model->id], ['class' => 'btn btn-green']) ?>
        <?= Html::a(' <i class="glyphicon glyphicon-signal"></i> ', ['/patient/chart/index', 'pid' => $model->id], ['class' => 'btn btn-pink pull-right', 'target' => '_blank']) ?>

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
            'attribute' => 'fullname',
            'value' => MyHelper::ptInfo_($model->id)
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
        'cright',
        'cousin',
        'tel',
        //'dupdate',
        [
            'attribute' => 'lat',
            'format' => 'raw',
            'label' => 'พิกัด',
            'value' => Html::a($model->lat . "," . $model->lon, ['/gate/go', 'url' => "http://maps.google.com/?q=$model->lat,$model->lon"], ['target' => '_blank'])
        ],
        [
            'attribute' => 'discharge',
            'value' => $model->discharge . "-" . $model->cdischarge->dischargedesc
        ],
        //'cdischarge.dischargedesc',
        'discharge_date:date',
        'discharge_note',
        'note:ntext',
        [
            'attribute' => 'cg_id',
            'value' => !empty($model->user->u_name) ? $model->user->u_prename . $model->user->u_name . ' ' . $model->user->u_lname : NULL
        ],
    ],
])
?>
<p>
    <?php if (MyHelper::isCm()): ?>
        <?= Html::a(' <i class="glyphicon glyphicon-remove"></i> จำหน่าย', ['/patient/patient/discharge', 'pid' => $model->id], ['class' => 'btn btn-black']) ?>

        <?php
        echo Html::a('<i class="glyphicon glyphicon-trash"></i> ลบข้อมูล', ['delete', 'pid' => $model->id], [
            'class' => 'btn btn-danger pull-right',
            'data' => [
                'confirm' => 'ยืนยันการลบข้อมูล!',
                'method' => 'post',
            ],
        ])
        ?>
    <?php endif; ?>
</p>

</div>
