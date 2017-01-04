<?php

use kartik\widgets\ActiveForm;
use kartik\helpers\Html;
use kartik\widgets\Select2;
use common\components\MyHelper;
use kartik\form\ActiveField;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Patient */
/* @var $form yii\widgets\ActiveForm */
?>



<?php
$form = ActiveForm::begin(['type' => ActiveForm::TYPE_VERTICAL]);
?>
<div class="form-group">
    <div class="col-sm-3">
        <?= $form->field($model, 'cid'); ?>
    </div>

    <div class="col-sm-3">
        <?php
        $items = MyHelper::dropDownItems(" SELECT t.prename id,t.prename val from c_prename t ", 'id', 'val');
        echo $form->field($model, 'prename')->widget(Select2::classname(), [
            'data' => $items,
            'language' => 'th',
            'options' => ['placeholder' => 'คำนำหน้าชื่อ ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>
    </div>

    <div class="col-sm-3">
        <?= $form->field($model, 'name')->textInput(['placeholder' => 'ชื่อ']) ?>
    </div>

    <div class="col-sm-3">
        <?= $form->field($model, 'lname')->textInput(['placeholder' => 'นามสกุล']) ?>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-3">
        <?= $form->field($model, 'sex')->dropDownList(['ชาย' => 'ชาย', 'หญิง' => 'หญิง'], ['prompt' => 'เพศ']) ?>
    </div>
    <div class="col-sm-3">

        <?php
        echo $form->field($model, 'birth')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'วดป.เกิด...'],
            'pickerButton' => [
                'icon' => 'ok',
            ],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]);
        ?>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-3">
        <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-3">
        <?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-2">
        <?= $form->field($model, 'subdistrict')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-1">
        <?= $form->field($model, 'village_no')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-2">

        <?= $form->field($model, 'village_name')->textInput(['maxlength' => true]) ?>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-2">
        <?= $form->field($model, 'house_no')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-2">
        <?= $form->field($model, 'lat')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-2">
        <?= $form->field($model, 'lon')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-1">
        <label for="btn-auto" style="color: white">...</label>
        <button type="button" class="btn btn-default" id="btn-auto">พิกัด</button>
    </div>

</div>

<div class="form-group">
    <div class="col-sm-4">  
        <?php
        $sql = "SELECT t.typeareacode id,concat(t.typeareacode,'-',t.typeareaname) val from c_typearea t ";
        $items = MyHelper::dropDownItems($sql, 'id', 'val');
        echo $form->field($model, 'typearea')->widget(Select2::classname(), [
            'data' => $items,
            'language' => 'th',
            'options' => ['placeholder' => 'เลือก ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>
    </div>

    <div class="col-sm-4">
        <?php
        $items = MyHelper::dropDownItems("SELECT t.nationname id,t.nationname val from c_nation t", 'id', 'val');

        echo $form->field($model, 'nation')->widget(Select2::classname(), [
            'data' => $items,
            'language' => 'th',
            'options' => ['placeholder' => 'เลือก ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>
    </div>
    <div class="col-sm-4">
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
    </div>
</div>

<div class="form-group">
    <div class="col-sm-3">   
        <?= $form->field($model, 'hospcode')->textInput() ?>
    </div>
    <div class="col-sm-3">  
        <?= $form->field($model, 'refer_from')->textInput() ?>
    </div>
    <div class="col-sm-3">  
        <?= $form->field($model, 'disease')->textInput() ?>
    </div>
    <div class="col-sm-3">  
        <?php
        $sql = "SELECT t.dischargecode id , concat(t.dischargecode,'-',t.dischargedesc) val from c_discharge t";
        $items = MyHelper::dropDownItems($sql, 'id', 'val');

        echo $form->field($model, 'discharge')->widget(Select2::classname(), [
            'data' => $items,
            'language' => 'th',
            'options' => ['placeholder' => 'เลือก ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>
    </div>

</div>
<div class="form-group">
    <div class="col-sm-12"> 
        <?php
        $office = MyHelper::getUserOffice();
        $sql = " SELECT t.id,CONCAT(t.prename,t.`name`,' ',t.lname) val FROM `user` t 
WHERE t.role = 3 AND t.office = '$office' ";
        $items = MyHelper::dropDownItems($sql, 'id', 'val');
        ?>
        <?=
        $form->field($model, 'cg_id')->widget(Select2::classname(), [
            'data' => $items,
            'language' => 'th',
            'options' => ['placeholder' => 'เลือก ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>
    </div>
</div>
<?= $form->field($model, 'dupdate')->hiddenInput(['value' => date('Y-m-d')])->label(FALSE) ?>

<div class="form-group">
    <div class="col-sm-3"> 
        
        <?= Html::submitButton($model->isNewRecord ? '+ เพิ่ม' : 'บันทึก ', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div> 
</div>

<?php ActiveForm::end(); ?>


