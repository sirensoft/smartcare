<?php

use yii\helpers\Html;
use common\components\MyHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Visit */

$this->title = 'แก้ไข เยี่ยมวันที่: ' . $model->date_visit;
$this->params['breadcrumbs'][] = ['label' => MyHelper::ptInfo_($model->patient_id), 'url' =>['/patient/patient/view','pid'=>$model->patient_id]];
$this->params['breadcrumbs'][] = ['label' => 'รายการเยี่ยม', 'url' => ['index','pid'=>$model->patient_id]];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไขการเยี่ยม';
?>
<div class="visit-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
