<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Club;
use common\components\MyHelper;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\ClubMember */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="club-member-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cid')->textInput(['maxlength' => true,'disabled' => true]) ?>
    <?php
    $hospcode = MyHelper::getUserOffice();
    $club = Club::find()->where(['hospcode'=>$hospcode,'status'=>'เปิดดำเนินการ'])->all();
    $items = ArrayHelper::map($club,'id', 'name');
    ?>

    <?= $form->field($model, 'club_id')->dropDownList($items,['prompt'=>'-- รายชื่อชมรม ---']) ?>

      <?php
        echo $form->field($model, 'date_begin')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'ปปป-ดด-วว'],
            'pickerButton' => [
                'icon' => 'ok',
            ],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]);
        ?>

    <?php
        echo $form->field($model, 'date_end')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'ปปป-ดด-วว'],
            'pickerButton' => [
                'icon' => 'ok',
            ],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]);
        ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 2]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
