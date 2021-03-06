<?php

use yii\helpers\Html;
use frontend\models\Patient;
use common\components\MyHelper;

//$model = Patient::findOne($pid);

$this->title = MyHelper::ptInfo_($pid);
$this->params['breadcrumbs'][] = ['label' => 'รายชื่อ', 'url' => ['/patient/patient/index']];
$this->params['breadcrumbs'][] = ['label' => MyHelper::ptInfo_($pid), 'url' => ['/patient/patient/view', 'pid' => $pid]];
$this->params['breadcrumbs'][] = 'ประเมินสุขภาพจิต';

use kartik\tabs\TabsX;
?>
<?php if (\Yii::$app->session->hasFlash('success')): ?>

    <?= \Yii::$app->session->getFlash('success') ?>

<?php endif; ?>

<?php

$tab_items = [];

$tab_items[] =[
    'label'=>'ผลการประเมินสุขภาพจิต',
    'content'=>$this->render('result',[
        'pid'=>$pid
    ]),
];
$tab_items[] =[
    'label'=>'คัดกรอง 2Q',
    'content'=>$this->render('2q')
];
$tab_items[] =[
    'label'=>'ประเมิน 9Q',
    'content'=>$this->render('9q')
];
$tab_items[] =[
    'label'=>'ประเมิน 8Q',
    'content'=>$this->render('8q')
];
$tab_items[] =[
    'label'=>'บันทึก',
    'content'=>$this->render('save')
];


echo TabsX::widget([
    'position' => TabsX::POS_ABOVE,
    'align' => TabsX::ALIGN_LEFT,
    'items' => $tab_items
]);

