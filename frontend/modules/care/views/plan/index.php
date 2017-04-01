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
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> จัดทำแผนการดูแล', ['create', 'pid' => $pid], ['class' => 'btn btn-green']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'responsiveWrap' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            //'id',
            //'hospcode',
            //'patient_id',
            [
                'attribute' => 'date_create',
                'format' => 'raw',
                'value' => function($model) {
                    //\Yii::$app->formatter->locale = 'th-TH';
                    $d=$model->date_create;
                    $d = \Yii::$app->formatter->asDate($d);
                    //return Html::a($d, ['view', 'id' => $model->id]);
                    return $d;
                },
                'contentOptions'=>[
                        'class'=>'text-center'
                ]
            ],
           
                    //'adl:integer:คะแนน ADL',
                [
                    'attribute'=>'adl',
                    'label'=>'คะแนน ADL',
                    'format'=>'integer',
                    'contentOptions'=>[
                        'class'=>'text-center'
                    ]
                ],
                    // 'adl_text',
                    // 'tai',
                    'tai_text:ntext:กลุ่ม',
                  [
            'attribute' => 'rapid_code',
            'label'=>'เร่งด่วน',
             'filter'=>FALSE,
            'format'=>'html',
            'value'=>function($model){
        
                return Html::a('<i class="glyphicon glyphicon-search"></i>',['view', 'id' => $model->id],['class'=>'btn btn-default btn-sm']);
            },
            'contentOptions' => function ($model) {
                    if ($model->rapid_code == 'yellow') {
                        return ['style' => "color:black;background-color:$model->rapid_code;",'class' => 'text-center'];
                    }
                    return ['style' => "color:white;background-color:$model->rapid_code;",'class' => 'text-center'];
                }
            ],
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
