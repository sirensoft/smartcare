<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\LogbookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Logbooks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logbook-index">

   


    <p>
        <?= Html::a('Create Logbook', ['create','pid'=>$pid], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'patient_id',
            'cg_id',
            'cm_id',
            //'cc:ntext',
            // 'pi:ntext',
            // 'fh:ntext',
            // 'ph:ntext',
            // 'mh:ntext',
            // 'nu:ntext',
            // 'he:ntext',
            // 'sh:ntext',
            // 'pe:ntext',
            // 'me:ntext',
            // 'pl:ntext',
            // 'pm:ntext',
            // 'co:ntext',
             'd_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
