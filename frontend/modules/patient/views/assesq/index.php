<?php

use yii\helpers\Html;
use frontend\models\Patient;

$model = Patient::findOne($pid);

$this->title = $model->name . " " . $model->lname;
$this->params['breadcrumbs'][] = ['label' => 'รายชื่อ', 'url' => ['/patient/patient/index']];
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูล', 'url' => ['/patient/patient/view', 'pid' => $pid]];
$this->params['breadcrumbs'][] = $this->title;

use kartik\tabs\TabsX;
?>
<?php if (\Yii::$app->session->hasFlash('success')): ?>

    <?= \Yii::$app->session->getFlash('success') ?>

<?php endif; ?>

<?php

$tab_items = [];

$tab_items[] =[
    'label'=>'ผลการประเมินสุขภาพจิต',
    'content'=>''
];
$tab_items[] =[
    'label'=>'ประเมิน 2Q',
    'content'=>$this->render('2q')
];
$tab_items[] =[
    'label'=>'ประเมิน 9Q',
    'content'=>$this->render('9q')
];
$tab_items[] =[
    'label'=>'ประเมิน 8Q',
    'content'=>'8q'
];


echo TabsX::widget([
    'position' => TabsX::POS_ABOVE,
    'align' => TabsX::ALIGN_LEFT,
    'items' => $tab_items
]);

