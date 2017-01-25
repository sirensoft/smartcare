<?php

use kartik\widgets\ActiveForm;
use kartik\helpers\Html;
use kartik\widgets\Select2;
use common\components\MyHelper;
use kartik\form\ActiveField;
use kartik\date\DatePicker;
use yii\web\JsExpression;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use kartik\widgets\TimePicker;

$css = <<< CSS
.alignment
{
    margin-top:25px;
}
CSS;
$this->registerCss($css);
?>



<?php
$form = ActiveForm::begin(['type' => ActiveForm::TYPE_VERTICAL]);
?>



<div class="form-group">
    <div class="col-sm-4">

        <?php
        $sql = "SELECT t.dischargecode id , concat(t.dischargecode,'-',t.dischargedesc) val from c_discharge t ";
        
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
    <div class="col-sm-4"> 
        <?= $form->field($model, 'discharge_date')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'วดป.จำหน่าย...'],
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
    <div class="col-sm-4"> 
        <?= $form->field($model, 'discharge_time')->widget(TimePicker::classname(), [
                'pluginOptions' => [
                    'showSeconds' => FALSE,
                    'showMeridian' => false,
                    'minuteStep' => 1,
                ],
            ]) ?>
    </div>

</div>
<div class="form-group">
    <div class="col-sm-12"> 
        <?= $form->field($model, 'discharge_note')->textarea(['cols' => 12, 'rows' => 4]) ?>
    </div>
</div>


<div class="form-group">
    <div class="col-sm-3"> 

        <?= Html::submitButton('<i class="glyphicon glyphicon-ok"></i> บันทึก ', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ยกเลิก', ['/patient/patient/index'], ['class' => 'btn btn-default']); ?>
    </div> 
</div>

<?= $form->field($model, 'dupdate')->hiddenInput(['value' => date('Y-m-d')])->label(FALSE) ?>
<?php ActiveForm::end(); ?>



