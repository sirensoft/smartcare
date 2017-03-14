<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use common\components\MyHelper;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายชื่อผู้ถูกจำหน่าย';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="patient-index">

    <?php
    $columns = [
        ['class' => 'yii\grid\SerialColumn'],
       
       
       
                //'prename',
                [
                    'format'=>'html',
                    //'attribute'=>'name',
                    'contentOptions'=>function($model){
                        
                        if($model->discharge==1){
                            return ['style' => "color:white;background-color:#332e2e;",'class' => 'text-center'];
                        }
                        return ['style' => "color:white;background-color:white;",'class' => 'text-center'];
                    },
                    'value' => function($model) {
                        return Html::a('<i class="glyphicon glyphicon-search"></i>', ['/patient/patient/view', 'pid' => $model->id],['class'=>'btn btn-sm btn-default']);
                    },
                ],
                'class_name',
                'name',
                'lname',
                //'age_y',
                //'birth',
                // 'province',
                // 'district',
                'subdistrict',
                'village_no',
                // 'village_name',
                'house_no',
                    // 'typearea',
                    // 'nation',
                    // 'race',
                    'discharge_date:date:จำหน่าย',
                    //'discharge_note:ntext',
                    // 
                    // 'dupdate',
                    //['class' => 'yii\grid\ActionColumn'],
           
            ];
            
            if (!MyHelper::isCg()) {
                $columns[] = [
                    'attribute' => 'cg_id',
                    'label' => 'CG',
                    'value' => 'user.u_name',
                    'group' => true,
                ];
            }
            ?>

            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'responsiveWrap' => false,
                'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
                'columns' => $columns,
            ]);
            ?>
</div>
