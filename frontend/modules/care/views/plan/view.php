<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\MyHelper;

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
            'date_create:date',
            'rapid_code',
            'adl',
            'adl_text',
            'tai',
            'tai_text',
            
            'dx1',
            'dx2',
            'drug:ntext',
            
            'patient_mind:ntext',
            'live_problem:ntext',
            'long_goal:ntext',
            'short_goal:ntext',
            'careful:ntext',
            'note_before_plan:ntext',
            'fct_care_time:text',
            'extra_service',
            'cg_care_time:text',
            'update_plan:ntext',
            'budget_need',
           // 'd_update',
        ],
    ]) ?>

     <p>
        
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-remove"></i> ลบ', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
         
         <?= Html::a('<i class="glyphicon glyphicon-print"></i> พิมพ์', ['excel', 'id' => $model->id], ['class' => 'btn btn-success pull-right']) ?>
        
        
    </p>
</div>
