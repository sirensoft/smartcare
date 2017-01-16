<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;
use yii\bootstrap\ButtonGroup;
use common\components\MyHelper;

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

            <?= Html::a('<i class="glyphicon glyphicon-list-alt"></i> ประวัติ', ['/health/default/index', 'pid' => $model->id], ['class' => 'btn btn-danger']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-plus"></i> ประเมิน', ['/patient/asses/index', 'pid' => $model->id], ['class' => 'btn btn-success']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-print"></i> พิมพ์', ['/patient/print/index', 'pid' => $model->id], ['class' => 'btn btn-info pull-right']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-calendar"></i> แผน', ['/care/plan/index', 'pid' => $model->id], ['class' => 'btn btn-warning ']) ?>

        <?php endif; ?>

        <?php if (MyHelper::isCg()): ?>
            <?= Html::a('<i class="glyphicon glyphicon-user"></i> ข้อมูล', ['/Profile/', 'pid' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-plus"></i> ประเมิน', ['/patient/asses/index', 'pid' => $model->id], ['class' => 'btn btn-danger']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-calendar"></i> แผน', ['/care/plan-week/index', 'pid' => $model->id], ['class' => 'btn btn-warning ']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-plus"></i> เยี่ยม', ['/care/visit/index', 'pid' => $model->id], ['class' => 'btn btn-success']) ?>

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
            'discharge',
            'cousin',
            'tel',
            'dupdate',
        ],
    ])
    ?>
    <p>
    <?php if (MyHelper::isCm()): ?>
        <?=
        Html::a('<i class="glyphicon glyphicon-minus"></i> ลบ', ['delete', 'pid' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
        <?php endif; ?>
    </p>

</div>
