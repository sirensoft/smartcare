<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Plans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Plan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'patient_id',
            'title:ntext',
            'start_date',
            'start_time',
            // 'end_date',
            // 'end_time',
            // 'color',
            // 'bg_color',
            // 'border_color',
            // 'text_color',
            // 'provider_id',
            // 'care_date',
            // 'care_time',
            // 'weight',
            // 'height',
            // 'pulse',
            // 'temp',
            // 'sbp',
            // 'dbp',
            // 'rr',
            // 'sugar',
            // 'note:ntext',
            // 'd_create',
            // 'd_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
