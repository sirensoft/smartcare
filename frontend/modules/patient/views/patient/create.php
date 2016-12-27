<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Patient */

$this->title = 'เพิ่มผู้ป่วย';
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนผู้ป่วย', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'เพิ่มผู้ป่วย';
?>
<div class="patient-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
