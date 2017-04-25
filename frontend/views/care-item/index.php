<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CareItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Care Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="care-item-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
    <?= GridView::widget([
        'responsiveWrap'=>FALSE,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'id',
                'label'=>'Code',
                'filter'=>FALSE
            ],
            'name:text:CareItem',
            //'category',
            //'note',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
