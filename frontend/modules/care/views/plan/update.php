<?php

use yii\helpers\Html;
use common\components\MyHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Plan */

$this->title = 'แก้ไขแผน: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'รายการแผน', 'url' => ['index','pid'=>$model->patient_id]];
$this->params['breadcrumbs'][] = ['label' => MyHelper::ptInfo_($model->patient_id), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="plan-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
