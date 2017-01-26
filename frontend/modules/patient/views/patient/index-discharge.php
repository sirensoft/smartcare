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
        'class_name',
       
        [
            'attribute' => 'cid',
            'format' => 'raw',
            'value' => function($model) {
                return Html::a($model->cid, ['/patient/patient/view', 'pid' => $model->id]);
            }
                ],
                //'prename',
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
                    'discharge_date:text:จำหน่าย',
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
