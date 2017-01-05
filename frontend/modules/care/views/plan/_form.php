<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Plan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'hospcode')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'patient_id')->textInput() ?>

    <?= $form->field($model, 'date_create')->textInput() ?>

    <?= $form->field($model, 'rapid_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adl')->textInput() ?>

    <?= $form->field($model, 'adl_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tai_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'budget_need')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dx1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dx2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'drug')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'note_before_plan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fct_care_time')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cg_care_time')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'update_plan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'patient_mind')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'live_problem')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'long_goal')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'short_goal')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'careful')->textarea(['rows' => 6]) ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
