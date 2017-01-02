<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Plan */

$this->title = 'Update Plan: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="plan-update">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
