<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CareItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Care Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="care-item-index">


    <?php 
    $click = " 
            var txt = window.opener.$('#planweek-title').html().trim();
            if(!txt){
                window.opener.$('#planweek-title').append('-'+$(this).attr('data'));
            }else{               
                window.opener.$('#planweek-title').append('\\n-'+$(this).attr('data'));
            }        
        window.close(); 
    ";
    ?>


    <?=
    GridView::widget([
        'responsiveWrap' => FALSE,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name:text:CareItem',
            [                
                'format' => 'raw',
                'value' => function($model) use ($click) {
                    return Html::button('<i class="glyphicon glyphicon-ok"></i>',[
                        'class' => 'btn btn-sm btn-default',
                        'data'=>$model->name,
                        'onclick'=> new JsExpression($click)
                    ]);
                },
            ],
               
         ],
    ]);
  ?>
</div>
