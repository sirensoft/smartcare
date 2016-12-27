<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii2mod\query\ArrayQuery;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use common\components\MyHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Patient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cid')->textInput(['maxlength' => true]) ?>


    <?php
    $items = MyHelper::dropDownItems(" SELECT t.prename id,t.prename val from c_prename t ", 'id', 'val');
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
    <?= $form->field($model, 'sex')->dropDownList(['ชาย'=>'ชาย','หญิง'=>'หญิง']) ?>
    <?= $form->field($model, 'birth')->textInput() ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subdistrict')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'village_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'village_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'house_no')->textInput(['maxlength' => true]) ?>
    <?php
     $items = MyHelper::dropDownItems(" SELECT t.typeareacode id,concat(t.typeareacode,'-',t.typeareaname) val from c_typearea t ", 'id', 'val');
    
    ?>
    <?= $form->field($model, 'typearea')->widget(Select2::classname(), [
        'data' => $items,
        'language' => 'th',
        'options' => ['placeholder' => 'เลือก ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

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
    <?= $form->field($model, 'discharge')->widget(Select2::classname(), [
        'data' => $items,
        'language' => 'th',
        'options' => ['placeholder' => 'เลือก ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'dupdate')->hiddenInput(['value' => date('Y-m-d')])->label(FALSE) ?>

    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? '+ เพิ่ม' : ' แก้ไข ', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
