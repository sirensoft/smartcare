<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'แผนการดูแล';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-index">

 
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Plan', ['create','pid'=>$pid], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'hospcode',
            //'patient_id',
            [
                'attribute'=>'date_create',
                'format'=>'raw',
                'value'=>function($model){
                    return \kartik\helpers\Html::a($model->date_create,['view','id'=>$model->id]);
                }
            ],
            'rapid_code',
            'adl',
            // 'adl_text',
            // 'tai',
            'tai_text',
            // 'budget_need',
            // 'dx1',
            // 'dx2',
            // 'drug:ntext',
            // 'note_before_plan:ntext',
            // 'fct_care_time:ntext',
            // 'cg_care_time:ntext',
            // 'update_plan:ntext',
            // 'patient_mind:ntext',
            // 'live_problem:ntext',
            // 'long_goal:ntext',
            // 'short_goal:ntext',
            // 'careful:ntext',
            // 'd_update',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
