<?php

use yii\helpers\Html;
use yii\grid\GridView;
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
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            //'plan_week_id',
            //'patient_id',
            //'provider_id',
            //'hospcode',
            'date_visit:date:วันที่',
            'start_time:time:เวลา',
            // 'end_time',
            // 'subjective:ntext',
            // 'obj_weight',
            // 'obj_heigh',
            // 'obj_bmi',
            // 'obj_temperature',
            // 'obj_pulse',
            // 'obj_rr',
            // 'obj_bp',
            'obj_adl:text:คะแนน ADL',
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
            [
                'attribute'=>'provider_id',
                'value'=>'user.u_name'
              
            ],
            // 'problem',
            // 'next_plan',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
