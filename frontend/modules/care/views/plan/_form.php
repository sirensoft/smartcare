<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Plan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'patient_cid')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'start_datetime')->textInput() ?>

    <?= $form->field($model, 'title')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'end_datetime')->textInput() ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bg_color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'border_color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'provider_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'care_datetime')->textInput() ?>

    <?= $form->field($model, 'care_note')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
