<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Logbook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="logbook-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'patient_id')->textInput() ?>

    <?= $form->field($model, 'cg_id')->textInput() ?>

    <?= $form->field($model, 'cm_id')->textInput() ?>

    <?= $form->field($model, 'cc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fh')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ph')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mh')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nu')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'he')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sh')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pe')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'me')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pl')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pm')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'co')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'd_update')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
