<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\components\MyHelper;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TugtSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ผลการคัดกรองภาวะหกล้ม TUGT';
$this->params['breadcrumbs'][] = ['label'=>  MyHelper::ptInfo_($pid),'url'=>['/patient/patient/view','pid'=>$pid]] ;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tugt-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> คัดกรอง', ['asses','pid'=>$pid], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'date_serv:date',
            'walk_time',
            'tugt_text',
            'note',
            // 'created_by',
            // 'updated_by',
            // 'created_at',
            // 'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {delete}'
            ],
        ],
    ]); ?>
</div>
