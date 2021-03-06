<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use common\components\MyHelper;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\VisitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายการเยี่ยม';
$this->params['breadcrumbs'][] = ['label' => MyHelper::ptInfo_($pid), 'url' => ['/patient/patient/view','pid'=>$pid]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visit-index">


    <p>
        <?=
        Html::a('<i class="glyphicon glyphicon-plus"></i> เยี่ยม', ['create',
            'pid' => $pid
                ], ['class' => 'btn btn-success'])
        ?>
        <?= Html::a(' <i class="glyphicon glyphicon-signal"></i> ', ['/patient/chart/index', 'pid' => $pid], ['class' => 'btn btn-pink pull-right', 'target' => '_blank']) ?>

    </p>
    <?=
    GridView::widget([
        'responsiveWrap' => false,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view}',
                'buttons'=>[
                    'view'=>function($url,$model,$key){
                        return Html::a('<i class="glyphicon glyphicon-search"></i>',$url,['class'=>'btn btn-info btn-sm']);
                    }
                ]
            ],
            //'id',
            //'plan_week_id',
            //'patient_id',
            //'provider_id',
            //'hospcode',
            'date_visit:date:วันที่',
            
            //'start_time:time:เวลา',
            // 'end_time',
            // 'subjective:ntext',
            'obj_weight',
            'obj_waist',
            // 'obj_heigh',
            // 'obj_bmi',
            // 'obj_temperature',
            //'obj_pulse',
            // 'obj_rr',
             'obj_bp',
             'obj_sugar',
            //'obj_adl:text:คะแนน ADL',
            // 'asses_1:ntext',
            // 'asses_2:ntext',
            // 'asses_3:ntext',
            // 'asses_4:ntext',
            // 'asses_5:ntext',
            // 'asses_6:ntext',
            // 'asses_7:ntext',
            // 'asses_8:ntext',
            // 'asses_9:ntext',
            'job_result:text:ผลการปฏิบัติงาน',
            //'next_plan:text:ครั้งถัดไป',
            [
                'attribute'=>'plan_week_id',
                'format'=>'raw',
                'label'=>'ตามแผน',
                'value'=>function($model){
                    return !empty($model->plan_week_id)?'<i class="glyphicon glyphicon-ok"></i>':NULL ;
                },
                'contentOptions' =>function($model){
                    if (!empty($model->plan_week_id)) {
                        return ['style' => "background-color:#00ff7f;",'class' => 'text-center'];
                    }
                        return ['class' => 'text-center'];
                },
                'filter'=>FALSE,
                //'sort'=>FALSE
            ],
             
            [
                'attribute'=>'provider_id',
                'value'=>'user.u_name'
              
            ],
            
            //'plan_week_id:integer:ลำดับแผน',
            // 'problem',
           
            
            
            
        ],
    ]);
    ?>
</div>
