<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PlanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'patient_cid') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'care_plan_start') ?>

    <?= $form->field($model, 'care_plan_end') ?>

    <?php // echo $form->field($model, 'color') ?>

    <?php // echo $form->field($model, 'bg_color') ?>

    <?php // echo $form->field($model, 'border_color') ?>

    <?php // echo $form->field($model, 'text_color') ?>

    <?php // echo $form->field($model, 'care_provider_id') ?>

    <?php // echo $form->field($model, 'care_datetime') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'height') ?>

    <?php // echo $form->field($model, 'pulse') ?>

    <?php // echo $form->field($model, 'temp') ?>

    <?php // echo $form->field($model, 'sbp') ?>

    <?php // echo $form->field($model, 'dbp') ?>

    <?php // echo $form->field($model, 'rr') ?>

    <?php // echo $form->field($model, 'sugar') ?>

    <?php // echo $form->field($model, 'note') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
