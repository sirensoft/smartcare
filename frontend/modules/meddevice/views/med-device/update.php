<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\meddevice\models\MedDevice */

$this->title = 'Update Med Device: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Med Devices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="med-device-update">

   
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
