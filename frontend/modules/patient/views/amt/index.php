<?php

use yii\helpers\Html;
use yii\grid\GridView;
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
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> ทดสอบ','#', ['class' => 'btn btn-success','id'=>'btn_add']) ?>
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
<!--ส่วน modal-->
<?php Modal::begin([
    'id'=>'modal',  
    'header' => 'ประเมิน AMT',
    'size' => 'modal-lg',
    'footer'=>'',    
])?>
<div id='modalContent'></div>
<?php Modal::end(); ?>

<?php
$route_asses = Url::to(['/patient/amt/asses','pid'=>$pid]);
$js = <<<JS
        $('#btn_add').click(function(){
            $('#modal').modal('show').find('#modalContent').load('$route_asses');
         });
        
JS;
$this->registerJs($js);
?>
