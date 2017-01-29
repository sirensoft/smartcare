<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Logbook */

$this->title = 'Update Logbook: ' . $model->patient_id;
$this->params['breadcrumbs'][] = ['label' => 'Logbooks', 'url' => ['index','pid'=>$model->patient_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="logbook-update">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
