<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tugt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tugt-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date_serv')->textInput() ?>

    <?= $form->field($model, 'walk_time')->textInput() ?>

    <div class="form-group pull-right">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
