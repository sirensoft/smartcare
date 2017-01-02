<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Plan */

$this->title = 'Create Plan';
$this->params['breadcrumbs'][] = ['label' => 'Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
