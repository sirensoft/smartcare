<?php

use kartik\widgets\ActiveForm;
use kartik\helpers\Html;
use kartik\widgets\Select2;
use common\components\MyHelper;
use kartik\form\ActiveField;

/* @var $this yii\web\View */
/* @var $model frontend\models\Patient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-form">

    <?php
    $form = ActiveForm::begin([
                'type' => ActiveForm::TYPE_HORIZONTAL
    ]);
    ?>

    <?= $form->field($model, 'cid', ['labelOptions' => ['class' => 'col-sm-2 col-md-2']]); ?>

    <div class="form-group">
        <?= Html::activeLabel($model, 'prename', ['label' => 'คำนำหน้า', 'class' => 'col-sm-2 control-label']) ?>
        <div class="col-sm-2">
            <?php
            $items = MyHelper::dropDownItems(" SELECT t.prename id,t.prename val from c_prename t ", 'id', 'val');
            echo $form->field($model, 'prename', ['showLabels' => false])->widget(Select2::classname(), [
                'data' => $items,
                'language' => 'th',
                'options' => ['placeholder' => 'เลือก ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <?= Html::activeLabel($model, 'name', ['label'=>'ชื่อ', 'class'=>'col-sm-2 control-label']) ?>
        <div class="col-sm-2">
            <?= $form->field($model, 'name',['showLabels' => false])->textInput(['maxlength' => true]) ?>
        </div>
        <?= Html::activeLabel($model, 'lname', ['label'=>'นามสกุล', 'class'=>'col-sm-2 control-label']) ?>
        <div class="col-sm-2">
            <?= $form->field($model, 'lname',['showLabels' => false])->textInput(['maxlength' => true]) ?>
        </div>
        <?= Html::activeLabel($model, 'sex', ['label'=>'เพศ', 'class'=>'col-sm-2 control-label']) ?>
        <div class="col-sm-2">
            <?= $form->field($model, 'sex',['showLabels' => false])->dropDownList(['ชาย' => 'ชาย', 'หญิง' => 'หญิง']) ?>
        </div>
    </div>
    <?= $form->field($model, 'birth')->textInput() ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subdistrict')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'village_no')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'village_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'house_no')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'lat')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'lon')->textInput(['maxlength' => true]) ?>
    <?php
    $items = MyHelper::dropDownItems(" SELECT t.typeareacode id,concat(t.typeareacode,'-',t.typeareaname) val from c_typearea t ", 'id', 'val');
    ?>
    <?=
    $form->field($model, 'typearea')->widget(Select2::classname(), [
        'data' => $items,
        'language' => 'th',
        'options' => ['placeholder' => 'เลือก ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?php
    $items = MyHelper::dropDownItems("SELECT t.nationname id,t.nationname val from c_nation t", 'id', 'val')
    ?>

    <?=
    $form->field($model, 'nation')->widget(Select2::classname(), [
        'data' => $items,
        'language' => 'th',
        'options' => ['placeholder' => 'เลือก ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?=
    $form->field($model, 'region')->widget(Select2::classname(), [
        'data' => $items,
        'language' => 'th',
        'options' => ['placeholder' => 'เลือก ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'disease')->textInput() ?>
    <?php
    $items = MyHelper::dropDownItems("SELECT t.dischargedesc id , concat(t.dischargecode,'-',t.dischargedesc) val from c_discharge t", 'id', 'val')
    ?>
    <?=
    $form->field($model, 'discharge')->widget(Select2::classname(), [
        'data' => $items,
        'language' => 'th',
        'options' => ['placeholder' => 'เลือก ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'dupdate')->hiddenInput(['value' => date('Y-m-d')])->label(FALSE) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '+ เพิ่ม' : ' แก้ไข ', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
