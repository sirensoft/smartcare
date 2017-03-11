<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\MyHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Visit */

$this->title = MyHelper::ptInfo_($model->patient_id);
$this->params['breadcrumbs'][] = ['label' => MyHelper::ptInfo_($model->patient_id), 'url' => ['/patient/patient/view', 'pid' => $model->patient_id]];

$this->params['breadcrumbs'][] = 'ข้อมูลการเยี่ยม';
?>
<div class="visit-view">



    <p>

        <?=
        Html::a('<i class="glyphicon glyphicon-remove"></i> ลบ', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-sm',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-print"></i> พิมพ์', ['excel', 'id' => $model->id], ['class' => 'btn btn-success btn-sm pull-right']) ?>

    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'plan_week_id',
            //'patient_id',
            [
                'attribute' => 'provider_id',
                'value' => $model->user->u_name . " " . $model->user->u_lname
            ],
            //'hospcode',
            'date_visit:date',
            'start_time',
            'end_time',
            'subjective:ntext',
            'obj_weight',
            'obj_heigh',
            'obj_waist',
            'obj_bmi',
            'obj_temperature',
            'obj_pulse',
            'obj_rr',
            'obj_bp',
            'obj_sugar',
            'obj_adl',
            'asses_1:ntext',
            'asses_2:ntext',
            'asses_3:ntext',
            'asses_4:ntext',
            'asses_5:ntext',
            'asses_6:ntext',
            'asses_7:ntext',
            'asses_8:ntext',
            'asses_9:ntext',
            'job_result',
            'problem',
            'next_plan',
        ],
    ])
    ?>

</div>
