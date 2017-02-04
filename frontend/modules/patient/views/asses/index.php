<?php

use yii\helpers\Html;
use frontend\models\Patient;
use common\components\MyHelper;

//$model = Patient::findOne($pid);

$this->title = MyHelper::ptInfo_($pid);
$this->params['breadcrumbs'][] = ['label' => 'รายชื่อ', 'url' => ['/patient/patient/index']];
$this->params['breadcrumbs'][] = ['label' => MyHelper::ptInfo_($pid), 'url' => ['/patient/patient/view', 'pid' => $pid]];
$this->params['breadcrumbs'][] = 'การประเมิน ADL';

use kartik\tabs\TabsX;
?>
<?php if (\Yii::$app->session->hasFlash('success')): ?>

    <?= \Yii::$app->session->getFlash('success') ?>

<?php endif; ?>

<?php

$tab_items = [];
$tab_items[] = [
    'label' => 'ผลการประเมิน ADL',
    'content' => $this->render('result', [
        'pid' => $pid
    ]),
    'active' => true
];

$tab_items[] = [
    'label' => 'ประเมิน ADL',
    'content' => $this->render('adl'),
];

$tab_items[] = [
    'label' => 'ประเมิน TAI ภาพ',
    'content' => $this->render('tai_img'),
];


echo TabsX::widget([
    'position' => TabsX::POS_ABOVE,
    'align' => TabsX::ALIGN_LEFT,
    'items' => $tab_items
]);

