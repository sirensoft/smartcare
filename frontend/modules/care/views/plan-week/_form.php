<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\MyHelper;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\models\Plan */
/* @var $form yii\widgets\ActiveForm */
?>

<?php if(MyHelper::getDay($model->start_date) == 'Mon' and !MyHelper::isCg() and $model->isNewRecord): ?>

<?=  Html::a('พิมพ์แผนสัปดาห์',['/care/plan-week/excel','pid'=>$model->patient_id,'start'=>$model->start_date], ['class'=>'btn btn-info'])?>

<?php endif; ?>

<?php $form = ActiveForm::begin(['id' => 'plan-form']); ?>
<?php if (MyHelper::isCm()): ?>
    <div class="form-group">
        <div class="col-md-12">
            <label class="control-label" for="chk_cg">
                <?= Html::checkbox('chk_cg', FALSE, ['id' => 'chk_cg', 'class' => 'from-control']); ?>
                ดูแลโดย CG
            </label>
        </div>
    </div>
<?php endif; ?>

<div class="form-group">
    <div class="col-md-6">
        <?= $form->field($model, 'start_date')->textInput(['readonly' => MyHelper::isCg()]) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'start_time')->textInput(['readonly' => MyHelper::isCg()]) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'end_time')->textInput(['readonly' => MyHelper::isCg()]) ?>
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
        $sql = "SELECT t.id,concat(t.u_name,' ',t.u_lname,' (',t.role_name,')') val FROM user t WHERE t.office = '$hos'";
        $items = MyHelper::dropDownItems($sql, 'id', 'val');
        echo $form->field($model, 'provider_id')->dropDownList($items, [
            'value' => $model->isNewRecord ? MyHelper::getCgId($model->patient_id) : $model->provider_id,
            'disabled' => MyHelper::isCg()
        ]);
        ?>
    </div>
</div>

<?php if ($model->isNewRecord and MyHelper::getDay($model->start_date) == 'Mon'): ?>
    <div class="form-group">
        <div class="col-md-12">
            <label class="control-label" for="chk_day">
                <?= Html::checkbox('chk_day', FALSE, ['id' => 'chk_day', 'class' => 'from-control']); ?>
                ทำทุกวันตลอดสัปดาห์ เวลาเดียวกันนี้
            </label>
        </div>
    </div>
<?php endif; ?>


<?php if (!$model->isNewRecord): ?>
    <?php if (!MyHelper::isCg()): ?>
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

<?php endif; ?>


<?php if (!$model->isNewRecord && MyHelper::isCm()) : ?>
    <?=
    Html::a('<i class="glyphicon glyphicon-minus"></i> ลบ', ['delete', 'id' => $model->id, 'pid' => $model->patient_id], [
        'class' => 'btn btn-danger',
        'data' => [
           // 'confirm' => 'ยืนยันการลบ',
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
    <?php if (MyHelper::getUserId() == $model->provider_id): ?>

        <?=
        Html::a('<i class="glyphicon glyphicon-ok"></i> บันทึกเยี่ยม', ['/care/visit/create',
            'pid' => $model->patient_id,
            'planweek_id' => $model->id,
            'start_date' => $model->start_date,
            'start_time' => $model->start_time
                ], ['class' => 'btn btn-primary'])
        ?>

    <?php else: ?>

        <button type="button" disabled="" class = 'btn btn-primary' ><i class="glyphicon glyphicon-ok"></i> บันทึกเยี่ยม</button>  

    <?php endif; ?>
<?php endif; ?>




<?php ActiveForm::end(); ?>

<?php
$js = <<<JS
   $('#chk_cg').change( function(){
       $('#planweek-title').text('ดูแลโดยCG');
       
    });
JS;
$this->registerJs($js);
?>


