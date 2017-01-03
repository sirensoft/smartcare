<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use common\components\MyHelper;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ทะเบียนผู้ป่วย';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php if(MyHelper::getUserRole()!==3):?>
        <?= Html::a('+ เพิ่มผู้ป่วย', ['create'], ['class' => 'btn btn-success']) ?>
        <?php endif;?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsiveWrap' => false,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'cid',
                'format'=>'raw',
                'value'=>function($model){
                    return Html::a($model->cid,['/patient/patient/view','pid'=>$model->id]);
                }
            ],
            //'prename',
            'name',
            'lname',
            'birth',
            // 'province',
            // 'district',
            'subdistrict',
             'village_no',
            // 'village_name',
            'house_no',
            // 'typearea',
            // 'nation',
            // 'region',
            // 'discharge',
            // 'disease',
            // 'dupdate',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
