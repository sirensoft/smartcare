<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Amt */

$this->title = 'Update Amt: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Amts', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="amt-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
