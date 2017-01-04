<?php
use frontend\models\Patient;
$model = Patient::findOne($pid);

$this->title = $model->name . " " . $model->lname;
$this->params['breadcrumbs'][] = ['label' => 'รายชื่อ', 'url' => ['/patient/patient/index']];
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูล', 'url' => ['/patient/patient/view','pid'=>$pid]];
$this->params['breadcrumbs'][] = $this->title;

use kartik\tabs\TabsX;

?>
<?php if (\Yii::$app->session->hasFlash('success')): ?>
  
  <?= \Yii::$app->session->getFlash('success') ?>

<?php endif; ?>

<?php

echo TabsX::widget([
    'position' => TabsX::POS_ABOVE,
    'align' => TabsX::ALIGN_LEFT,
    'items' => [
        [
            'label' => 'ประวัติ',
            'content' => $this->render('history',[
                'pid'=>$pid
            ]),
             'active' => true
            
        ],
        [
            'label' => 'แบบประเมิน ADL',
            'content' => $this->render('adl'),
           
        ],
        /*[
            'label' => 'แบบประเมิน TAI',
            'content' => $this->render('tai'),
            
        ],*/
        [
            'label' => 'แบบประเมิน TAI ภาพ',
            'content' => $this->render('tai_img'),
            
        ],
        
       
    ],
]);

