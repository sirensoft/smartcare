<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\MyHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="panel panel-danger">

        <div class="panel-body">
            <div class="form-group">
                <div class="col-md-4">
                    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                </div>

            </div>

            <div class="form-group">
                <div class="col-md-6">
                    <?php
                    $sql = "select id,name val from c_role";
                    $items = MyHelper::dropDownItems($sql, 'id', 'val');
                    ?>
                    <?= $form->field($model, 'role')->dropDownList($items) ?>

                </div>
                <div class="col-md-6">
                    <?php
                    $items = ['1' => 'YES-เปิดการใช้งาน', '0' => 'NO-ปิดการใช้งาน'];
                    if ($model->isNewRecord) {
                        $model->status = 1;
                    }
                    ?>
                    <?= $form->field($model, 'status')->dropDownList($items) ?>
                </div>

            </div>


            <div class="form-group">
                <div class="col-md-3">
                    <?= $form->field($model, 'u_cid')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'u_prename')->textInput(['maxlength' => true, 'placeholder' => 'นาย/นาง/น.ส./อื่นๆ']) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'u_name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'u_lname')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="form-group">

                <div class="col-md-4">
                    <?= $form->field($model, 'officer_type')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'office_position')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'office')->textInput(['maxlength' => true]) ?>
                </div>

            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <?= $form->field($model, 'register_no') ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'counsil') ?>
                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
