<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ClubSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ชมรม';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="club-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> เพิ่ม', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'responsiveWrap' => false,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name:text:ชื่อชมรม',
            'addr:ntext:ที่ทำการ',
            //'date_begin',
            //'date_end',
             'member:integer:สมาชิก',
            'status',
            // 'register_no',
            // 'budget',
            // 'hospcode',
            // 'note:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
