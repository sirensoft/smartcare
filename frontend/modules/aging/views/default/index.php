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
        'before'=>'(เชื่อมต่อข้อมูลจากระบบ HDC กระทรวงสาธารณสุข)',
        'heading'=>'รายชื่อ'
    ],
    'beforeHeader'=>[
        [
            'columns'=>[
               
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
    ],
    'columns' => [      
        'cid',
        'name:text:ชื่อ', 
        'lname:text:สกุล',
        'sex:text:เพศ',
        'age:integer:อายุ',
        'moo:text:หมู่ที่',
        
        'adl_date:date:คัด',
        [
            'attribute'=>'adl_code',
            'label'=>'ADL',
            'value'=>function($model){
                $code = $model['adl_code'];
                $val =['1B1280'=>'ติดสังคม','1B1281'=>'ติดบ้าน','1B1282'=>'ติดเตียง'];
                if(!empty($val[$code])){
                    return $val[$code];
                }
            }
        ],
                
        'dm_date:date:คัด',
        [
            'attribute'=>'dm_risk',
            'label'=>'DM',
            'value'=>function($model){
                $code = $model['dm_risk'];
                $val =['0'=>'ปกติ','1'=>'เสี่ยง','2'=>'เสี่ยงสูง'];
                if(!empty($val[$code])){
                    return $val[$code];
                }
            }
        ],
                
        'ht_date:date:คัด',
        [
            'attribute'=>'ht_risk',
            'label'=>'HT',
            'value'=>function($model){
                $code = $model['ht_risk'];
                $val =['0'=>'ปกติ','1'=>'เสี่ยง','2'=>'เสี่ยงสูง'];
                if(!empty($val[$code])){
                    return $val[$code];
                }
            }
        ],
        
        'cvd_score:text:คะแนน',
        [
            'attribute'=>'cvd_score',
            'label'=>'CVD',
            'value'=>function($model){
                $code = $model['cvd_res'];
                $val =['1'=>'ต่ำ','2'=>'ปานกลาง','3'=>'สูง','4'=>'สูงมาก','5'=>'สูงอันตราย'];
                if(!empty($val[$code])){
                    return $val[$code];
                }
            }
        ],
                
        'dent_date:date:คัด',
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
        
        'amt_date:date:คัด',
        [
            'attribute'=>'amt_code',
            'label'=>'AMT',
            'value'=>function($model){
                $code = $model['amt_code'];
                $val =['1B1220'=>'ปกติ','1B1221'=>'ผิดปกติ','1B1223'=>'ผิดปกติ','1B1229'=>'ไม่ระบุ'];
                if(!empty($val[$code])){
                    return $val[$code];
                }
            }
        ],
                
        '2q_date:date:คัด',
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
                
        'knee_date:date:คัด',
        [
            'attribute'=>'knee_code',
            'label'=>'เข่า',
            'value'=>function($model){
                $code = $model['knee_code'];
                $val =['1B1270'=>'ปกติ','1B1271'=>'ผิดปกติ','1B1272'=>'ผิดปกติ','1B1279'=>'ไม่ระบุ'];
                if(!empty($val[$code])){
                    return $val[$code];
                }
            }
        ],
                
         'fall_date:date:คัด',
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
        
        'bmi:text:BMI'
        
       
    ]
]);
