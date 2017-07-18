<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\modules\meddevice\models\MedDevice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="med-device-form">

    <?php $form = ActiveForm::begin([
        'id'=>'meddevice',        
        ]); ?>



    <?= $form->field($model, 'device_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'device_from')->textInput(['maxlength' => true]) ?>

     <?php
        echo $form->field($model, 'get_date')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'วดป.ที่ยืม'],
            'pickerButton' => [
                'icon' => 'calendar',
            ],
            'language' => 'th',
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true
            ]
        ]);
        ?>

     <?php
        echo $form->field($model, 'send_date')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'วดป.ที่ส่งคืน'],
            'pickerButton' => [
                'icon' => 'calendar',
            ],
            'language' => 'th',
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true
            ]
        ]);
        ?>

    <?= $form->field($model, 'device_status')->dropDownList([  'ยืม' => 'ยืม','คืน' => 'คืน' ]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
