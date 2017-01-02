<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Patient */

$this->title = 'แก้ไข: ' . $model->name." ".$model->lname;
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนผู้ป่วย', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' =>$model->name." ".$model->lname, 'url' => ['view', 'pid' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="patient-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
