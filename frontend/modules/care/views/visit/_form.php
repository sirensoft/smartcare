<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\CTemplateVisit;

/* @var $this yii\web\View */
/* @var $model frontend\models\Visit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visit-form">

    <?php $form = ActiveForm::begin(); ?>


    <?php //$form->field($model, 'plan_week_id')->textInput() ?>

    <?php //$form->field($model, 'patient_id')->textInput() ?>

    <?php //$form->field($model, 'provider_id')->textInput() ?>

    <?php //$form->field($model, 'hospcode')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <div class="col-md-4">
            <?= $form->field($model, 'date_visit')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'start_time')->textInput() ?>
        </div>
        <div class="col-md-4">

            <?= $form->field($model, 'end_time')->textInput() ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <?= $form->field($model, 'subjective')->textarea(['rows' => 6]) ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3">
            <?= $form->field($model, 'obj_weight')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'obj_heigh')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'obj_bmi')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'obj_temperature')->textInput() ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3">
            <?= $form->field($model, 'obj_pulse')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'obj_rr')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'obj_bp')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'obj_adl')->textInput() ?>
        </div>
    </div>
    <?php
    if (empty($model->asses_1)) {
        $model->asses_1 = CTemplateVisit::findOne(1)->templat_text;
    }
    ?>
    <?= $form->field($model, 'asses_1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'asses_2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'asses_3')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'asses_4')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'asses_5')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'asses_6')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'asses_7')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'asses_8')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'asses_9')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'job_result')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'problem')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'next_plan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
