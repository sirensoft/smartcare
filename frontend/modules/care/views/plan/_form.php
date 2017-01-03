<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\MyHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Plan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plan-form">

    <?php $form = ActiveForm::begin(['id' => 'plan-form']); ?>

    <?php
    //echo $form->field($model, 'patient_id')->textInput(['maxlength' => true]);
    ?>
    <div class="form-group">
        <?= $form->field($model, 'start_date')->textInput(['readonly' => MyHelper::isCg()]) ?>
        <?= $form->field($model, 'start_time')->textInput(['readonly' => MyHelper::isCg()]) ?>
    </div>
    <?= $form->field($model, 'title')->textarea(['rows' => 4, 'readonly' => MyHelper::isCg()]) ?>
    <?= $form->field($model, 'provider_id')->textInput(['maxlength' => true]) ?>



    <?php if (!$model->isNewRecord): ?>








        <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'height')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'pulse')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'temp')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sbp')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'dbp')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'rr')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sugar')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>


    <?php endif; ?>
    <div class="form-group">
        <?php if (!$model->isNewRecord and MyHelper::isCm()) : ?>
            <?=
            Html::a('<i class="glyphicon glyphicon-minus"></i> ลบ', ['delete', 'id' => $model->id, 'pid' => $model->patient_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'ยืนยันการลบ',
                    'method' => 'post',
                ],
            ])
            ?>
        <?php endif; ?> 
        <?=
        Html::submitButton($model->isNewRecord ? ' <i class="glyphicon glyphicon-ok"></i> ' : '<i class="glyphicon glyphicon-ok"></i> บันทึก', [
            'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'
        ])
        ?>

    </div>

<?php ActiveForm::end(); ?>

</div>
