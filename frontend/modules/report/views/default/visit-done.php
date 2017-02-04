<?php

use common\components\MyHelper;
use kartik\grid\GridView;
use yii\helpers\Html;
use frontend\models\PlanWeekSearch;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use frontend\models\Patient;



$this->title = 'รายงาน';
$this->params['breadcrumbs'][]=['label'=>'รายงาน','url'=>['/report/']];
$this->params['breadcrumbs'][] = 'รายงานผลการดูแลตามแผน';

$searchModel = new PlanWeekSearch();
$searchModel->is_done = '0';
$searchModel->is_cm = MyHelper::isCm();
$searchModel->hospcode = MyHelper::getUserOffice();

if(MyHelper::isCg()){
    $searchModel->provider_id = MyHelper::getUserId();
}
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

echo GridView::widget([
    'panel'=>[
        'before'=>''
    ],
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'responsiveWrap' => false,
    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
    'columns'=>[
        ['class' => 'yii\grid\SerialColumn'],
        
        'start_date:text:แผนวันที่',
         [
            'attribute'=>'patient_id',
            'label'=>'ผู้สูงอายุ',
            'value'=>'patient.fullname',
             'group'=>true,
            
        ],
        'title:text:กิจกรรมตามแผน',
        [
            'attribute'=>'is_done',
            'filter'=>['0'=>'0-ยังไม่ดูแล','1'=>'1-ดูแลแล้ว'],
            
            'contentOptions' => function ($model) {
                if ($model->is_done=='0') {
                    return ['style' => "color:white;background-color:red;text-aling:center"];
                }
                return ['style' => "color:white;background-color:green;text-aling:center"];
               
            }
        ],
        [
            'attribute'=>'provider_id',
            'value'=>'user.u_name',
            'filter'=>!MyHelper::isCg()
        ]
        
    ]
]);





