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
    'summary'=>'ผลการคัดกรอง/ประเมิน (43แฟ้ม)',
    'responsiveWrap' => false,
    'dataProvider' => $dataProvider,
    'columns'=>[   
       
        [
            'attribute'=>'adl_code',
            'label'=>'ADL',
            'value'=>function($model){
                $code = $model['adl_code'];
                $val =['1B1280'=>'ติดสังคม','1B1281'=>'ติดบ้าน','1B1282'=>'ติดเตียง'];
                if(!empty($val[$code])){
                    return $val[$code];
                }
            },
            'contentOptions'=>function($model){
                $code = $model['adl_code'];
                if ($code == '1B1282') {
                    return ['style' => "color:white;background-color:red;",'class' => 'text-center'];
                }
                 if ($code == '1B1281') {
                    return ['style' => "color:black;background-color:yellow;",'class' => 'text-center'];
                }
             }
        ],
        [
            'attribute'=>'dm_risk',
            'label'=>'เบาหวาน',
            'value'=>function($model){
                $code = $model['dm_risk'];
                $val =['0'=>'ปกติ','1'=>'เสี่ยง','2'=>'เสี่ยงสูง'];
                if(!empty($val[$code])){
                    return $val[$code];
                }
            }
        ],
        [
            'attribute'=>'ht_risk',
            'label'=>'ความดัน',
            'value'=>function($model){
                $code = $model['ht_risk'];
                $val =['0'=>'ปกติ','1'=>'เสี่ยง','2'=>'เสี่ยงสูง'];
                if(!empty($val[$code])){
                    return $val[$code];
                }
            }
        ],       
        [
            'attribute'=>'cvd_res',
            'label'=>'CVD',
            'value'=>function($model){
                $code = $model['cvd_res'];
                $val =['1'=>'ต่ำ','2'=>'ปานกลาง','3'=>'สูง','4'=>'สูงมาก','5'=>'สูงอันตราย'];
                if(!empty($val[$code])){
                    return $val[$code]." (".$model['cvd_score'].")";
                }
            },
            'contentOptions'=>function($model){
                 $code = $model['cvd_res'];
                if ($code == '4') {
                    return ['style' => "color:black;background-color:pink;width: 65px;",'class' => 'text-center'];
                }
                if ($code == '5') {
                    return ['style' => "color:white;background-color:red;width: 65px;",'class' => 'text-center'];
                }
                
             }
        ],
        [
            'attribute'=>'dent_code',
            'label'=>'ช่องปาก',
            'value'=>function($model){
                $code = $model['dent_code'];
                $val =['1B1260'=>'ปกติ','1B1261'=>'ผิดปกติ','1B1269'=>'ไม่ระบุ'];
                if(!empty($val[$code])){
                    return $val[$code];
                }
            }
        ], 
        [
            'attribute'=>'amt_code',
            'label'=>'สมองเสื่อม AMT',
            'value'=>function($model){
                $code = $model['amt_code'];
                $val =['1B1220'=>'ปกติ','1B1221'=>'ผิดปกติ','1B1223'=>'ผิดปกติ','1B1229'=>'ไม่ระบุ'];
                if(!empty($val[$code])){
                    return $val[$code];
                }
            },
            'contentOptions'=>['style'=>'width: 120px;']
        ], 
        [
            'attribute'=>'2q_code',
            'label'=>'2Q',
            'value'=>function($model){
                $code = $model['2q_code'];
                $val =['1B0280'=>'ปกติ','1B0281'=>'ผิดปกติ'];
                if(!empty($val[$code])){
                    return $val[$code];
                }
            }
        ],
         [
            'attribute'=>'knee_code',
            'label'=>'ข้อเข่า',
             'value'=>function($model){
                $code = $model['knee_code'];
                $val =['1B1270'=>'ปกติ','1B1271'=>'ผิดปกติ','1B1272'=>'ผิดปกติ','1B1279'=>'ไม่ระบุ'];
                if(!empty($val[$code])){
                    return $val[$code];
                }
            }
        ],
         [
            'attribute'=>'fall_code',
            'label'=>'หกล้ม',
             'value'=>function($model){
                $code = $model['fall_code'];
                $val =['1B1200'=>'ปกติ','1B1201'=>'ผิดปกติ','1B1202'=>'ผิดปกติ','1B1209'=>'ไม่ระบุ'];
                if(!empty($val[$code])){
                    return $val[$code];
                }
            }
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
<?php if($pt && !$i): ?>
<p>
    <?=  Html::a('<i class="glyphicon glyphicon-search"></i> LTC', ['/patient/patient/view','pid'=>$pt->id],['class'=>'btn btn-success'])?>
</p>
<?php endif; ?>
