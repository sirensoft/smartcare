<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Plan */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-view">

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
            'patient_id',
            'title:ntext',
            'care_plan_start',
            'care_plan_end',
            'color',
            'bg_color',
            'border_color',
            'text_color',
            'care_provider_id',
            'care_datetime',
            'weight',
            'height',
            'pulse',
            'temp',
            'sbp',
            'dbp',
            'rr',
            'sugar',
            'note:ntext',
        ],
    ]) ?>

</div>
