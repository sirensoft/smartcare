<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\CTemplateVisit;
use common\components\MyHelper;
use frontend\models\Patient;
use kartik\widgets\DatePicker;
use kartik\widgets\TimePicker;
use kartik\widgets\Select2;

$css = <<< CSS
.alignment
{
    margin-top:25px;
}
CSS;
$this->registerCss($css);
?>

<div class="visit-form">

    <?php $form = ActiveForm::begin(); ?>


    <?php //$form->field($model, 'plan_week_id')->textInput() ?>

    <?php //$form->field($model, 'patient_id')->textInput() ?>

    <?php if (!MyHelper::isCg()): ?>
        <div class="form-group">
            <div class="col-md-12">
                <?php
                $office = MyHelper::getUserOffice();
                $sql = " SELECT t.id,CONCAT(t.u_prename,t.u_name,' ',t.u_lname,' (',t.role_name,')') val FROM `user` t 
WHERE t.office = '$office' order by t.role ";
                $items = MyHelper::dropDownItems($sql, 'id', 'val');
                ?>
                <?=
                $form->field($model, 'provider_id')->widget(Select2::classname(), [
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
    <?php endif; ?>


    <?php //$form->field($model, 'hospcode')->textInput(['maxlength' => true]) ?>
    <div class="form-group">

        <div class="col-md-4">
            <?=
            $form->field($model, 'date_visit')->widget(DatePicker::classname(), [
                'pickerButton' => [
                    'icon' => 'ok',
                ],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ])
            ?>
        </div>
        <div class="col-md-4">
            <?=
            $form->field($model, 'start_time')->widget(TimePicker::classname(), [
                'pluginOptions' => [
                    'showSeconds' => FALSE,
                    'showMeridian' => FALSE,
                    'minuteStep' => 1,
                ],
            ])
            ?>
        </div>
        <div class="col-md-4">

            <?=
            $form->field($model, 'end_time')->widget(TimePicker::classname(), [
                'pluginOptions' => [
                    'showSeconds' => FALSE,
                    'showMeridian' => FALSE,
                    'minuteStep' => 1,
                ],
            ])
            ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <?php
            if (empty($model->subjective)) {
                $model->subjective = CTemplateVisit::findOne(10)->templat_text;
            }
            ?>
            <?= $form->field($model, 'subjective')->textarea(['rows' => 4]) ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4">
            <?= $form->field($model, 'obj_weight')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'obj_heigh')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'obj_bmi')->textInput() ?>
        </div>       
    </div>
    <div class="form-group">
         <div class="col-md-4">
            <?= $form->field($model, 'obj_temperature')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'obj_pulse')->textInput() ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'obj_rr')->textInput() ?>
        </div>
       
    </div>
    <div class="form-group">
         <div class="col-md-4">
            <?= $form->field($model, 'obj_bp')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'obj_sugar')->textInput() ?>
        </div>

        <div class="col-md-4">
            <?php
            if (empty($model->obj_adl)) {
                $pt = Patient::findOne($model->patient_id);
                $model->obj_adl = $pt->adl;
            }
            ?>
            <div class="input-group">
                <?= $form->field($model, 'obj_adl')->textInput() ?>
                <span class="input-group-btn">
                    <?=
                    Html::a('<i class="glyphicon glyphicon-list-alt"></i>'
                            , ['/patient/asses/index', 'pid' => $model->patient_id], ['class' => 'btn btn-default alignment'])
                    ?>

                </span> 
            </div>
        </div>
        
    </div>
    <div class="form-group">
        <div class="col-md-6">
            <?php
            if (empty($model->asses_1)) {
                $model->asses_1 = CTemplateVisit::findOne(1)->templat_text;
            }
            ?>
            <?= $form->field($model, 'asses_1')->textarea(['rows' => 7]) ?>
        </div>
        <div class="col-md-6">
            <?php
            if (empty($model->asses_2)) {
                $model->asses_2 = CTemplateVisit::findOne(2)->templat_text;
            }
            ?>
            <?= $form->field($model, 'asses_2')->textarea(['rows' => 7]) ?>
        </div>
    </div>


    <div class="form-group">
        <div class="col-md-6">
            <?php
            if (empty($model->asses_3)) {
                $model->asses_3 = CTemplateVisit::findOne(3)->templat_text;
            }
            ?>
            <?= $form->field($model, 'asses_3')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-md-6">
            <?php
            if (empty($model->asses_4)) {
                $model->asses_4 = CTemplateVisit::findOne(4)->templat_text;
            }
            ?>
            <?= $form->field($model, 'asses_4')->textarea(['rows' => 6]) ?>
        </div>
    </div>


    <div class="form-group">
        <div class="col-md-6">
            <?php
            if (empty($model->asses_5)) {
                $model->asses_5 = CTemplateVisit::findOne(5)->templat_text;
            }
            ?>
            <?= $form->field($model, 'asses_5')->textarea(['rows' => 4]) ?>
        </div>
        <div class="col-md-6">
            <?php
            if (empty($model->asses_6)) {
                $model->asses_6 = CTemplateVisit::findOne(6)->templat_text;
            }
            ?>
            <?= $form->field($model, 'asses_6')->textarea(['rows' => 4]) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6">
            <?php
            if (empty($model->asses_7)) {
                $model->asses_7 = CTemplateVisit::findOne(7)->templat_text;
            }
            ?>
            <?= $form->field($model, 'asses_7')->textarea(['rows' => 3]) ?>
        </div>
        <div class="col-md-6">
            <?php
            if (empty($model->asses_8)) {
                $model->asses_8 = CTemplateVisit::findOne(8)->templat_text;
            }
            ?>
            <?= $form->field($model, 'asses_8')->textarea(['rows' => 3]) ?>
        </div>
    </div>


    <div class="form-group">
        <div class="col-md-12">
            <?php
            if (empty($model->asses_9)) {
                $model->asses_9 = CTemplateVisit::findOne(9)->templat_text;
            }
            ?>
            <?= $form->field($model, 'asses_9')->textarea(['rows' => 3]) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12">
             <?php
            if (empty($model->job_result) && $model->isNewRecord) {
                $model->job_result = CTemplateVisit::findOne(11)->templat_text;
            }
            ?>
            <?= $form->field($model, 'job_result')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <?= $form->field($model, 'problem')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12">
            <?= $form->field($model, 'next_plan')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12">
            <?= Html::submitButton('<i class="glyphicon glyphicon-ok"></i> บันทึก', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$js = <<<JS
      $( "#visit-obj_bmi" ).focusin(function() {
            var h = $("#visit-obj_heigh").val();
            var w = $("#visit-obj_weight").val();
            var bmi = w/((h*h)/10000);
            var b = bmi.toFixed(2);
            $( this ).val(b);
        });  
JS;

$this->registerJs($js);
?>
