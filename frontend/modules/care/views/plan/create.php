<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Plan */

$this->title = 'จัดทำ';
$this->params['breadcrumbs'][] = ['label' => 'แผนการดูแล', 'url' => ['index','pid'=>$model->patient_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
