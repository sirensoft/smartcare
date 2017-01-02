<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Plan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plan-form">

    <?php $form = ActiveForm::begin(['id'=>'plan-form']); ?>

    <?= $form->field($model, 'patient_id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'start_date')->textInput() ?>
    <?= $form->field($model, 'start_time')->textInput() ?>
    <?= $form->field($model, 'title')->textarea(['rows' => 6]) ?>




    <?php if (!$model->isNewRecord): ?>
        

        

        <?= $form->field($model, 'provider_id')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'care_date')->textInput() ?>

        <?= $form->field($model, 'care_time')->textInput() ?>

        <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'height')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'pulse')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'temp')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sbp')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'dbp')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'rr')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sugar')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'd_create')->textInput() ?>

        <?= $form->field($model, 'd_update')->textInput() ?>
    <?php endif; ?>
    <div class="form-group">
        <?php if(!$model->isNewRecord): ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id,'pid'=>$model->patient_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?php endif; ?>
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
         
    </div>

    <?php ActiveForm::end(); ?>

</div>
