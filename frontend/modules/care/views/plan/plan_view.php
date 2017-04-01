<?php

use common\components\MyHelper;

$this->title = MyHelper::ptInfo_($model->patient_id);
$this->params['breadcrumbs'][] = ['label'=>'รายชื่อ','url'=>['/patient/patient/index',]];
$this->params['breadcrumbs'][] = ['label' => 'รายการแผน', 'url' => ['index','pid'=>$model->patient_id]];
$this->params['breadcrumbs'][] = $this->title;


use kartik\tabs\TabsX;

echo TabsX::widget([
    'position' => TabsX::POS_ABOVE,
    'align' => TabsX::ALIGN_LEFT,
    'items' => [
        [
            'label' => 'CARE PLAN',
            'content' => $this->render('view',[
                'model'=>$model
            ]),
            
            
        ],
        [
            'label'=>'WEEKLY PLAN',
            'content'=>"<div id='week'>week</div>"
            
            
            
        ]
        
    ],
]);
?>
<div>
   
            
            
</div>

<?php

$js= <<< JS
 
  $('#week').load('index.php?r=care/plan-week/index&pid=$model->patient_id') ;
     
  
       
JS;
$this->registerJS($js);
?>
        
  
