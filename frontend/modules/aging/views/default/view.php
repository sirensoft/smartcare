<?php

use kartik\tabs\TabsX;
use yii\helpers\Html;
use frontend\models\Patient;


$model = $dataProvider->getModels();


$this->title = ' รายละเอียด ';

$this->params['breadcrumbs'][] = ['label' => 'รายชื่อผู้สูงอายุทั้งหมดในพื้นที่รับผิดชอบ', 'url' => ['/aging']];
$this->params['breadcrumbs'][] = $model[0]['prename'] . $model[0]['name'] . ' ' . $model[0]['lname'] . '(' . $model[0]['age'] . 'ปี)';
echo TabsX::widget([
    'items' => [
        [
            'label' => 'ข้อมูล',
            'content' => $this->render('info', [
                'model' => $model,
                'dataProvider'=>$dataProvider
            ])
        ],
        [
            'label' => 'คัดกรอง-ออนไลน์',
            'content' => '<div>ยังไม่เปิดใช้งาน</div>'
        ]
    ]
]);
?>

<?php
$pt = Patient::find()->where(['cid'=>$model[0]['cid']])->one();
?>
<?php if($pt): ?>
<p>
    <?=  Html::a('<i class="glyphicon glyphicon-search"></i> LTC', ['/patient/patient/view','pid'=>$pt->id],['class'=>'btn btn-danger'])?>
</p>
<?php endif; ?>








