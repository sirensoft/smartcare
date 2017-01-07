<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/*
$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Plans', 'url' => ['index','pid'=>$model->patient_id]];
$this->params['breadcrumbs'][] = $this->title
*/
?>
<div class="plan-view">
   

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'hospcode',
            //'patient_id',
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
            'fct_care_time:text',
            'cg_care_time:text',
            'update_plan:ntext',
            'patient_mind:ntext',
            'live_problem:ntext',
            'long_goal:ntext',
            'short_goal:ntext',
            'careful:ntext',
           // 'd_update',
        ],
    ]) ?>

     <p>
        
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
         
         <?= Html::a('พิมพ์', ['print', 'id' => $model->id], ['class' => 'btn btn-info pull-right']) ?>
        
        
    </p>
</div>
