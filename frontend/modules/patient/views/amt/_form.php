<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Amt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="amt-form">

    <?php $form = ActiveForm::begin(); ?>

   

    <?= $form->field($model, 'date_serv')->textInput() ?>

    <?= $form->field($model, 'amt_text')->dropDownList(['ปกติ'=>'ปกติ','ผิดปกติ'=>'ผิดปกติ']) ?>

    <?= $form->field($model, 'specialpp_code')->hiddenInput()->label('') ?>

 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
