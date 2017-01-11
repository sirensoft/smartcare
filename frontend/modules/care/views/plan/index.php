<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use common\components\MyHelper;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = MyHelper::ptInfo_($pid);
$this->params['breadcrumbs'][] = ['label'=>'รายชื่อ','url'=>['/patient/patient/index',]];
$this->params['breadcrumbs'][] = ['label'=>$this->title,'url'=>['/patient/patient/view','pid'=>$pid]];
$this->params['breadcrumbs'][] = "รายการแผน"
?>

<div class="plan-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> จัดทำแผนการดูแล', ['create', 'pid' => $pid], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            //'hospcode',
            //'patient_id',
            [
                'attribute' => 'date_create',
                'format' => 'raw',
                'value' => function($model) {
                    return \kartik\helpers\Html::a($model->date_create, ['view', 'id' => $model->id]);
                }
                    ],
                   [
            'attribute' => 'rapid_code',
            'contentOptions' => function ($model) {
                if ($model->rapid_code == 'yellow') {
                    return ['style' => "color:black;background-color:$model->rapid_code;"];
                }
                return ['style' => "color:white;background-color:$model->rapid_code;"];
            }
                ],
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
            ]);
            ?>
</div>
