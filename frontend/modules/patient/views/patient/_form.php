<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii2mod\query\ArrayQuery;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\models\Patient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cid')->textInput(['maxlength' => true]) ?>

    <?php
    $sql = " SELECT t.prename id,t.prename val from c_prename t ";
    $raw = \Yii::$app->db->createCommand($sql)->queryAll();
    $items = ArrayHelper::map($raw, 'id', 'val');
    ?>

    <?php
    echo $form->field($model, 'prename')->widget(Select2::classname(), [
        'data' => $items,
        'language' => 'th',
        'options' => ['placeholder' => 'เลือก ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth')->textInput() ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subdistrict')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'village_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'village_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'house_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'typearea')->textInput() ?>

    <?= $form->field($model, 'nation')->textInput() ?>

    <?= $form->field($model, 'region')->textInput() ?>

    <?= $form->field($model, 'discharge')->textInput() ?>

    <?= $form->field($model, 'dupdate')->hiddenInput(['value' => date('Y-m-d')])->label(FALSE) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
