<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Visit */

$this->title = 'เพิ่มการเยี่ยม';
$this->params['breadcrumbs'][] = ['label' => 'รายการเยี่ยม', 'url' => ['index','pid'=>$model->patient_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visit-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
