<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AmtSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'การทดสอบสภาพสมอง';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="amt-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-list-alt"></i> ทดสอบ', ['asses', 'pid' => NULL], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            //'patient_id',
            'date_serv:date:วันที่',
            'amt_text:text:ผลทดสอบ',
            'specialpp_code:text:รหัส สนย.',
            // 'created_by',
            // 'updated_by',
            // 'created_at',
            // 'updated_at',
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {delete}'
            ],
        ],
    ]);
    ?>
</div>
