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
            <?php
            if (empty($model->subjective)) {
                $model->subjective = CTemplateVisit::findOne(10)->templat_text;
            }
            ?>
            <?= $form->field($model, 'subjective')->textarea(['rows' => 4]) ?>
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
    <div class="form-group">
        <div class="col-md-6">
            <?php
            if (empty($model->asses_1)) {
                $model->asses_1 = CTemplateVisit::findOne(1)->templat_text;
            }
            ?>
            <?= $form->field($model, 'asses_1')->textarea(['rows' => 7]) ?>
        </div>
        <div class="col-md-6">
            <?php
            if (empty($model->asses_2)) {
                $model->asses_2 = CTemplateVisit::findOne(2)->templat_text;
            }
            ?>
            <?= $form->field($model, 'asses_2')->textarea(['rows' => 7]) ?>
        </div>
    </div>


    <div class="form-group">
        <div class="col-md-6">
            <?php
            if (empty($model->asses_3)) {
                $model->asses_3 = CTemplateVisit::findOne(3)->templat_text;
            }
            ?>
            <?= $form->field($model, 'asses_3')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-md-6">
            <?php
            if (empty($model->asses_4)) {
                $model->asses_4 = CTemplateVisit::findOne(4)->templat_text;
            }
            ?>
            <?= $form->field($model, 'asses_4')->textarea(['rows' => 6]) ?>
        </div>
    </div>


    <div class="form-group">
        <div class="col-md-6">
            <?php
            if (empty($model->asses_5)) {
                $model->asses_5 = CTemplateVisit::findOne(5)->templat_text;
            }
            ?>
            <?= $form->field($model, 'asses_5')->textarea(['rows' => 4]) ?>
        </div>
        <div class="col-md-6">
            <?php
            if (empty($model->asses_6)) {
                $model->asses_6 = CTemplateVisit::findOne(6)->templat_text;
            }
            ?>
            <?= $form->field($model, 'asses_6')->textarea(['rows' => 4]) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6">
            <?php
            if (empty($model->asses_7)) {
                $model->asses_7 = CTemplateVisit::findOne(7)->templat_text;
            }
            ?>
            <?= $form->field($model, 'asses_7')->textarea(['rows' => 3]) ?>
        </div>
        <div class="col-md-6">
            <?php
            if (empty($model->asses_8)) {
                $model->asses_8 = CTemplateVisit::findOne(8)->templat_text;
            }
            ?>
            <?= $form->field($model, 'asses_8')->textarea(['rows' => 3]) ?>
        </div>
    </div>


    <div class="form-group">
        <div class="col-md-12">
            <?php
            if (empty($model->asses_9)) {
                $model->asses_9 = CTemplateVisit::findOne(9)->templat_text;
            }
            ?>
            <?= $form->field($model, 'asses_9')->textarea(['rows' => 3]) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12">
            <?= $form->field($model, 'job_result')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <?= $form->field($model, 'problem')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12">
            <?= $form->field($model, 'next_plan')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12">
            <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
