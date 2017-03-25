<?php
$css = <<< CSS
.alignment
{
    margin-top:10px;
}
CSS;
$this->registerCss($css);

use kartik\grid\GridView;
use common\components\MyHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = 'รายชื่อผู้สูงอายุทั้งหมดในพื้นที่รับผิดชอบ ';

$this->params['breadcrumbs'][] = $this->title;







echo GridView::widget([
    'responsiveWrap' => false,
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'panel'=>[
        'before'=>'(เชื่อมต่อกับ 43 แฟ้ม)',
        'heading'=>'รายชื่อ'
    ],
    /*'beforeHeader'=>[
        [
            'columns'=>[
                ['content'=>'#', 'options'=>['colspan'=>1, 'class'=>'text-center warning']],
                ['content'=>'ผู้สูงอายุ', 'options'=>['colspan'=>6, 'class'=>'text-center warning']],
                ['content'=>'ADL', 'options'=>['colspan'=>2, 'class'=>'text-center warning']],
                ['content'=>'เบาหวาน', 'options'=>['colspan'=>2, 'class'=>'text-center warning']],
                ['content'=>'ความดัน', 'options'=>['colspan'=>2, 'class'=>'text-center warning']],
                ['content'=>'CVD', 'options'=>['colspan'=>2, 'class'=>'text-center warning']],
                ['content'=>'ช่องปาก', 'options'=>['colspan'=>2, 'class'=>'text-center warning']],
                ['content'=>'สมองเสื่อม', 'options'=>['colspan'=>2, 'class'=>'text-center warning']],
                ['content'=>'2Q', 'options'=>['colspan'=>2, 'class'=>'text-center warning']],
                ['content'=>'เข่าเสื่อม', 'options'=>['colspan'=>2, 'class'=>'text-center warning']],
                ['content'=>'หกล้ม', 'options'=>['colspan'=>2, 'class'=>'text-center warning']],
                ['content'=>'BMI', 'options'=>['colspan'=>1, 'class'=>'text-center warning']],
               
                 
            ],
            //'options'=>['class'=>'skip-export'] // remove this row from export
        ]
    ],*/
    'columns' => [  
        [
        'class' => 'yii\grid\SerialColumn',
        
        ],
        [            
            'label'=>'',
            'format' => 'raw',
            'value' => function($model) {
                return Html::a('<i class="glyphicon glyphicon-search"></i>', ['/aging/default/view', 'cid' => $model['cid']],['class'=>'btn btn-sm btn-info']);
            },
            'filter'=>FALSE
        ],
        
        //'cid',
        //'prename:text:คำนำ',            
        //'name:text:ชื่อ', 
        'hospcode:text:#',
        [
            'attribute'=>'name',
            'label'=>'ชื่อ',
            'value'=>function($model){
                return $model['prename'].$model['name'];
            }
        ],
        'lname:text:สกุล',
        [
            'attribute'=>'sex',
            'label'=>'เพศ',
            'filter'=>['1'=>'ชาย','2'=>'หญิง'],
            'value'=>function($model){
                $val=['1'=>'ชาย','2'=>'หญิง'];
                return $val[$model['sex']];
            }
        ],
        'age:integer:อายุ',
        'tmb:text:ตำบล',
        'moo:text:หมู่ที่',
        
        
        [
            'attribute'=>'adl_code',
            'label'=>'ADL',
            'filter'=>['1B1280'=>'ติดสังคม','1B1281'=>'ติดบ้าน','1B1282'=>'ติดเตียง'],
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
            'label'=>'DM',
            'filter'=>['0'=>'ปกติ','1'=>'เสี่ยง','2'=>'เสี่ยงสูง'],
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
            'label'=>'HT',
            'filter'=>['0'=>'ปกติ','1'=>'เสี่ยง','2'=>'เสี่ยงสูง'],
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
            'filter'=>['1'=>'ต่ำ','2'=>'ปานกลาง','3'=>'สูง','4'=>'สูงมาก','5'=>'สูงอันตราย'],
            'label'=>'CVD',
            'value'=>function($model){
                $code = $model['cvd_res'];
                $val =['1'=>'ต่ำ','2'=>'ปานกลาง','3'=>'สูง','4'=>'สูงมาก','5'=>'สูงอันตราย'];
                if(!empty($val[$code])){
                    return $val[$code];
                }
            },
            'contentOptions'=>function($model){
                 $code = $model['cvd_res'];
                if ($code == '5') {
                    return ['style' => "color:white;background-color:red;",'class' => 'text-center'];
                }
                
             }
        ],
                
       
        [
            'attribute'=>'dent_code',
            'label'=>'ปาก',
            'filter'=>['1B1260'=>'ปกติ','1B1261'=>'ผิดปกติ','1B1269'=>'ไม่ระบุ'],
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
            'label'=>'AMT',
            'filter'=>['1B1220'=>'ปกติ','1B1221'=>'ผิดปกติ(1B1221)','1B1223'=>'ผิดปกติ(1B1223)','1B1229'=>'ไม่ระบุ'],
            'value'=>function($model){
                $code = $model['amt_code'];
                $val =['1B1220'=>'ปกติ','1B1221'=>'ผิดปกติ','1B1223'=>'ผิดปกติ','1B1229'=>'ไม่ระบุ'];
                if(!empty($val[$code])){
                    return $val[$code];
                }
            }
        ],
                
       
        [
            'attribute'=>'2q_code',
            'label'=>'2Q',
            'filter'=>['1B0280'=>'ปกติ','1B0281'=>'ผิดปกติ'],
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
            'label'=>'เข่า',
            'filter'=>['1B1270'=>'ปกติ','1B1271'=>'ผิดปกติ(1B1271)','1B1272'=>'ผิดปกติ(1B1272)','1B1279'=>'ไม่ระบุ'],
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
            'filter'=>['1B1200'=>'ปกติ','1B1201'=>'ผิดปกติ(1B1201)','1B1202'=>'ผิดปกติ(1B1202)','1B1209'=>'ไม่ระบุ'],
            'value'=>function($model){
                $code = $model['fall_code'];
                $val =['1B1200'=>'ปกติ','1B1201'=>'ผิดปกติ','1B1202'=>'ผิดปกติ','1B1209'=>'ไม่ระบุ'];
                if(!empty($val[$code])){
                    return $val[$code];
                }
            }
        ],
        
        'bmi:text:BMI'
        
       
    ]
]);
