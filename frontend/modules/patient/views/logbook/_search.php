<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\LogbookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="logbook-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'patient_id') ?>

    <?= $form->field($model, 'cg_id') ?>

    <?= $form->field($model, 'cm_id') ?>

    <?= $form->field($model, 'cc') ?>

    <?php // echo $form->field($model, 'pi') ?>

    <?php // echo $form->field($model, 'fh') ?>

    <?php // echo $form->field($model, 'ph') ?>

    <?php // echo $form->field($model, 'mh') ?>

    <?php // echo $form->field($model, 'nu') ?>

    <?php // echo $form->field($model, 'he') ?>

    <?php // echo $form->field($model, 'sh') ?>

    <?php // echo $form->field($model, 'pe') ?>

    <?php // echo $form->field($model, 'me') ?>

    <?php // echo $form->field($model, 'pl') ?>

    <?php // echo $form->field($model, 'pm') ?>

    <?php // echo $form->field($model, 'co') ?>

    <?php // echo $form->field($model, 'd_update') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
