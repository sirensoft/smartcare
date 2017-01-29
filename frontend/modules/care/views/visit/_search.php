<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\VisitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'plan_week_id') ?>

    <?= $form->field($model, 'patient_id') ?>

    <?= $form->field($model, 'provider_id') ?>

    <?= $form->field($model, 'hospcode') ?>

    <?php // echo $form->field($model, 'date_visit') ?>

    <?php // echo $form->field($model, 'start_time') ?>

    <?php // echo $form->field($model, 'end_time') ?>

    <?php // echo $form->field($model, 'subjective') ?>

    <?php // echo $form->field($model, 'obj_weight') ?>

    <?php // echo $form->field($model, 'obj_heigh') ?>

    <?php // echo $form->field($model, 'obj_bmi') ?>

    <?php // echo $form->field($model, 'obj_temperature') ?>

    <?php // echo $form->field($model, 'obj_pulse') ?>

    <?php // echo $form->field($model, 'obj_rr') ?>

    <?php // echo $form->field($model, 'obj_bp') ?>

    <?php // echo $form->field($model, 'obj_adl') ?>

    <?php // echo $form->field($model, 'asses_1') ?>

    <?php // echo $form->field($model, 'asses_2') ?>

    <?php // echo $form->field($model, 'asses_3') ?>

    <?php // echo $form->field($model, 'asses_4') ?>

    <?php // echo $form->field($model, 'asses_5') ?>

    <?php // echo $form->field($model, 'asses_6') ?>

    <?php // echo $form->field($model, 'asses_7') ?>

    <?php // echo $form->field($model, 'asses_8') ?>

    <?php // echo $form->field($model, 'asses_9') ?>

    <?php // echo $form->field($model, 'job_result') ?>

    <?php // echo $form->field($model, 'problem') ?>

    <?php // echo $form->field($model, 'next_plan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
