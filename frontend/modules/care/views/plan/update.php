<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Plan */

$this->title = 'แก้ไขแผน: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Plans', 'url' => ['index','pid'=>$model->patient_id]];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="plan-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
