<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Visit */

$this->title = 'แก้ไข เยี่ยมวันที่: ' . $model->date_visit;
$this->params['breadcrumbs'][] = ['label' => 'รายการเยี่ยม', 'url' => ['index','pid'=>$model->patient_id]];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไขการเยี่ยม';
?>
<div class="visit-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
