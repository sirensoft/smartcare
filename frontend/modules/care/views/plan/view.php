<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Plans', 'url' => ['index','pid'=>$model->patient_id]];
$this->params['breadcrumbs'][] = $this->title

?>
<div class="plan-view">


    <p>
        <?= Html::a('<i class="glyphicon glyphicon-calendar"></i> Weekly-Plan', ['/care/plan-week/index', 'pid' => $model->patient_id], ['class' => 'btn btn-warning']) ?>

        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary pull-right']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger pull-right',
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
            'hospcode',
            'patient_id',
            'date_create',
            'rapid_code',
            'adl',
            'adl_text',
            'tai',
            'tai_text',
            'budget_need',
            'dx1',
            'dx2',
            'drug:ntext',
            'note_before_plan:ntext',
            'fct_care_time:ntext',
            'cg_care_time:ntext',
            'update_plan:ntext',
            'patient_mind:ntext',
            'live_problem:ntext',
            'long_goal:ntext',
            'short_goal:ntext',
            'careful:ntext',
            'd_update',
        ],
    ]) ?>

</div>
