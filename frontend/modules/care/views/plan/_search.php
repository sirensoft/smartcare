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

    <?= $form->field($model, 'hospcode') ?>

    <?= $form->field($model, 'patient_id') ?>

    <?= $form->field($model, 'date_create') ?>

    <?= $form->field($model, 'rapid_code') ?>

    <?php // echo $form->field($model, 'adl') ?>

    <?php // echo $form->field($model, 'adl_text') ?>

    <?php // echo $form->field($model, 'tai') ?>

    <?php // echo $form->field($model, 'tai_text') ?>

    <?php // echo $form->field($model, 'budget_need') ?>

    <?php // echo $form->field($model, 'dx1') ?>

    <?php // echo $form->field($model, 'dx2') ?>

    <?php // echo $form->field($model, 'drug') ?>

    <?php // echo $form->field($model, 'note_before_plan') ?>

    <?php // echo $form->field($model, 'fct_care_time') ?>

    <?php // echo $form->field($model, 'cg_care_time') ?>

    <?php // echo $form->field($model, 'update_plan') ?>

    <?php // echo $form->field($model, 'patient_mind') ?>

    <?php // echo $form->field($model, 'live_problem') ?>

    <?php // echo $form->field($model, 'long_goal') ?>

    <?php // echo $form->field($model, 'short_goal') ?>

    <?php // echo $form->field($model, 'careful') ?>

    <?php // echo $form->field($model, 'd_update') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
