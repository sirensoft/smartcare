<?php

use common\components\MyHelper;

$this->title = MyHelper::ptInfo_($model->patient_id);
$this->params['breadcrumbs'][] = ['label'=>'รายชื่อ','url'=>['/patient/patient/index',]];
$this->params['breadcrumbs'][] = ['label' => 'รายการแผน', 'url' => ['index','pid'=>$model->patient_id]];
$this->params['breadcrumbs'][] = $this->title;


use kartik\tabs\TabsX;
use yii\helpers\Url;
$route = Url::to(['/care/plan-week/index','pid'=>$model->patient_id]);

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
            'content'=>"<div id='week'>week</div>",
            //'content'=>$this->render($route)
            
            
            
        ]
        
    ],
]);
?>
<div>
   
            
            
</div>

<?php

$js= <<< JS
 
  
  $('#week').load('$route'); 
  
       
JS;
$this->registerJS($js);
?>
        
  
