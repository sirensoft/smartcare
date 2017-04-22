<?php
use kartik\grid\GridView;
use yii\widgets\DetailView;
use yii\helpers\Html;
use frontend\models\Patient;

echo DetailView::widget([
    'model'=>$model[0],
    'attributes' => [
        'cid:text:เลข13หลัก',
        [
            'label'=>'ชื่อ-สกุล',
            'value'=>$model[0]['prename'].$model[0]['name'].' '.$model[0]['lname']. '('.$model[0]['age'].'ปี)'
        ],
        [
            'label'=>'ที่อยู่',
            'value'=>$model[0]['addr'].' หมู่ที่ '.$model[0]['moo'].' ต.'.$model[0]['tmb_name'].' อ.'.$model[0]['amp_name'].' จ.'.$model[0]['prov_name']
            
        ] ,
        [
            'label'=>'โรคประจำตัว',
            'value'=>$model[0]['dx']
        ]
    ]   
]);
?>

<?php

echo GridView::widget([
    'summary'=>'คัดกรอง/ประเมิน',
    'responsiveWrap' => false,
    'dataProvider' => $dataProvider,
    'columns'=>[        
        [
            'attribute'=>'adl_code',
            'label'=>'ADL'
        ],
        [
            'attribute'=>'dm_risk',
            'label'=>'เบาหวาน'
        ],
        [
            'attribute'=>'ht_risk',
            'label'=>'ความดัน'
        ],       
        [
            'attribute'=>'cvd_score',
            'label'=>'CVD'
        ],
        [
            'attribute'=>'dent_code',
            'label'=>'ช่องปาก'
        ], 
        [
            'attribute'=>'amt_code',
            'label'=>'สมอง AMT'
        ], 
        [
            'attribute'=>'2q_code',
            'label'=>'2Q'
        ],
         [
            'attribute'=>'knee_code',
            'label'=>'ข้อเข่า'
        ],
         [
            'attribute'=>'fall_code',
            'label'=>'หกล้ม'
        ],
         [
            'attribute'=>'bmi',
            'label'=>'BMI'
        ],
        
    ]
]);
?>

<?php
$pt = Patient::find()->where(['cid'=>$model[0]['cid']])->one();
?>
<?php if($pt): ?>
<p>
    <?=  Html::a('<i class="glyphicon glyphicon-search"></i> LTC', ['/patient/patient/view','pid'=>$pt->id],['class'=>'btn btn-danger'])?>
</p>
<?php endif; ?>
