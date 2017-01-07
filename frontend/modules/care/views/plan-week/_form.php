<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\MyHelper;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\models\Plan */
/* @var $form yii\widgets\ActiveForm */
?>



<?php $form = ActiveForm::begin(['id' => 'plan-form']); ?>


<div class="form-group">
    <div class="col-md-6">
        <?= $form->field($model, 'start_date')->textInput(['readonly' => MyHelper::isCg()]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'start_time')->textInput(['readonly' => MyHelper::isCg()]) ?>
    </div>
</div>
<div class="form-group">
    <div class="col-md-12">
        <?= $form->field($model, 'title')->textarea(['rows' => 3, 'readonly' => MyHelper::isCg()]) ?>
    </div>
</div>

<div class="form-group">
    <div class="col-md-12">

        <?php
        $provider_id = MyHelper::getCgId($model->patient_id);
        $hos = MyHelper::getUserOffice();
        $sql = "SELECT t.id,concat(t.name,' ',t.lname,' (',t.role_name,')') val FROM user t WHERE t.office = '$hos'";
        $items = MyHelper::dropDownItems($sql, 'id', 'val');
        echo $form->field($model, 'provider_id')->dropDownList($items, [            
            'value'=>$model->isNewRecord?MyHelper::getCgId($model->patient_id):$model->provider_id,
            'disabled'=>  MyHelper::isCg()
        ]);
        ?>


    </div>
</div>


<?php if (!$model->isNewRecord): ?>

    <div class="form-group">
        <div class="col-md-3">
            <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'height')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'waist')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'pulse')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3">
            <?= $form->field($model, 'temp')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'sbp')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'dbp')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'rr')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'sugar')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <?= $form->field($model, 'note')->textarea(['rows' => 4]) ?>
        </div>
    </div>

<?php endif; ?>


<?php if (!$model->isNewRecord && MyHelper::isCm()) : ?>
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

<?php if (!MyHelper::isCg()): ?>
    <?=
    Html::submitButton($model->isNewRecord ? ' <i class="glyphicon glyphicon-ok"> เพิ่ม</i> ' : '<i class="glyphicon glyphicon-ok"></i> บันทึก', [
        'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'
    ])
    ?>
<?php else: ?> 
    <?php
    $btn = "button";
    $isDisabled = "disabled";
    if (MyHelper::getUserId() == $model->provider_id) {
        $btn = "submit";
        $isDisabled = "data-btn";
    }
    ?>
<button type="<?= $btn ?>" <?=$isDisabled?> class = 'btn btn-primary' ><i class="glyphicon glyphicon-ok"></i> บันทึก</button>
<?php endif; ?>




<?php ActiveForm::end(); ?>


