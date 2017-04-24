<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Club */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="club-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addr')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_begin')->textInput() ?>

    <?= $form->field($model, 'date_end')->textInput() ?>

   

    <?= $form->field($model, 'status')->dropDownList([ 'เปิดดำเนินการ' => 'เปิดดำเนินการ', 'ยุติดำเนินการ' => 'ยุติดำเนินการ', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'register_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'budget')->textInput(['maxlength' => true]) ?>

  

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
