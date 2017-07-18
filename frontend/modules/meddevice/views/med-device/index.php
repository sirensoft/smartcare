<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use common\components\MyHelper;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\meddevice\models\MedDeviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายการอุปกรณ์การแพทย์';
$this->params['breadcrumbs'][] = ['label' => MyHelper::ptInfo_($pid), 'url' => ['/patient/patient/view', 'pid' => $pid]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="med-device-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> เพิ่มรายการ', '#', ['class' => 'btn btn-lime', 'id' => 'btn-add']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            //'patient_id',
            'device_name',
            'device_from',
            'get_date:date:วดป.ที่ยืม',
            [
                'attribute' => 'device_status',
                'filter' => ['ยืม' => 'ยืม', 'คืน' => 'คืน']
            ],
            'send_date:date:วดป.ที่ส่งคืน',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',
            [
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a('แก้ไข', '#', ['class' => 'btn btn-blue', 'id' => 'btn-update', 'data-id' => $model->id]);
                }
                    ],
                    [
                        'format' => 'raw',
                        'value' => function($model) {
                            return Html::a('<i class="glyphicon glyphicon-remove"></i>', 
                                    ['delete', 'id' => $model->id], [
                                        'class' => 'btn btn-danger',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete this item?',
                                            'method' => 'post',
                                        ],
                            ]);
                        }
                            ]
                        ],
                    ]);
                    ?>
                </div>
                    <?php
                    Modal::begin([
                        'header' => 'เพิ่ม-แก้ไข',
                        'size' => 'modal-md',
                        'id' => 'modal',
                    ]);
                    echo "<div id='modalContent'></div>";

                    Modal::end();
                    ?>

                <?php
                $route_add = Url::to(['create', 'pid' => $pid]);
                $route_update = Url::to(['update', 'id' => 1]);
                $js = <<<JS
      $('#btn-add').click(function(){
           $('#modal').modal('show').find('#modalContent').load('$route_add'); 
       });
       
       $('#btn-update').click(function(){
           $('#modal').modal('show').find('#modalContent').load('$route_update'); 
       }); 
      
JS;
                $this->registerJs($js);
                ?>
