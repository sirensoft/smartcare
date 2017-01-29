<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Visit */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'plan_week_id',
            'patient_id',
            'provider_id',
            'hospcode',
            'date_visit',
            'start_time',
            'end_time',
            'subjective:ntext',
            'obj_weight',
            'obj_heigh',
            'obj_bmi',
            'obj_temperature',
            'obj_pulse',
            'obj_rr',
            'obj_bp',
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
    ]) ?>

</div>
