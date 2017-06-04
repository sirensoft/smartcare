<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use common\components\MyHelper;
use yii\web\JsExpression;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AmtSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ผลการทดสอบสภาพสมอง  Abbreviated Mental Test (AMT)';
$this->params['breadcrumbs'][] = ['label'=>  MyHelper::ptInfo_($pid),'url'=>['/patient/patient/view','pid'=>$pid]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="amt-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> ทดสอบ','#', ['class' => 'btn btn-success','id'=>'btn-add']) ?>
    </p>
    <?=
    GridView::widget([
        'responsiveWrap'=>FALSE,
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
                'template'=>'{update} {delete}',
                'buttons'=>[
                    'update'=>function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>','#', [                            
                            'title' => Yii::t('yii', 'แก้ไข'),                                                    
                            'class'=>'btn-update',
                            'data-id'=>$model->id
                        ]);
                    }
                ]
            ],
        ],
    ]);
    ?>
</div>
<!--ส่วน modal-->
<?php Modal::begin([
    'id'=>'modal',  
    'header' => 'ประเมิน AMT ทำเครื่องหมายถูกหลังข้อที่ตอบถูก',
    'size' => 'modal-lg',
    'footer'=>'',    
])?>
<div id='modalContent'></div>
<?php Modal::end(); ?>
<?php Modal::begin([
    'id'=>'modal-update',  
    'header' => 'แก้ไข',
    'size' => 'modal-md',
    'footer'=>'',    
])?>
<div id='modalContent'></div>
<?php Modal::end(); ?>

<?php
$route_asses = Url::to(['/patient/amt/asses','pid'=>$pid]);
$route_update = Url::to(['/patient/amt/update']);
$js = <<<JS
        $('#btn-add').click(function(){
            $('#modal').modal('show').find('#modalContent').load('$route_asses');
         });
        $('.btn-update').click(function(){
           var id = $(this).attr('data-id');            
            $('#modal-update').modal('show').find('#modalContent').load('$route_update&id='+id);
         });
        
JS;
$this->registerJs($js);
?>
