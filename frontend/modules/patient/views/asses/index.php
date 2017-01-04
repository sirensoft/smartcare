<?php
use frontend\models\Patient;
$model = Patient::findOne($pid);

$this->title = $model->name . " " . $model->lname;
$this->params['breadcrumbs'][] = ['label' => 'รายชื่อ', 'url' => ['/patient/patient/index']];
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูล', 'url' => ['/patient/patient/view','pid'=>$pid]];
$this->params['breadcrumbs'][] = $this->title;

use kartik\tabs\TabsX;

echo TabsX::widget([
    'position' => TabsX::POS_ABOVE,
    'align' => TabsX::ALIGN_LEFT,
    'items' => [
        [
            'label' => 'แบบประเมิน ADL',
            'content' => $this->render('adl'),
            'active' => true
        ],
        [
            'label' => 'แบบประเมิน TAI',
            'content' => $this->render('tai'),
            
        ],
       
    ],
]);
