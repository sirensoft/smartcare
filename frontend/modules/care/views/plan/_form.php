<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\CColor;
use yii\helpers\ArrayHelper;
use frontend\models\CTemplate;

/* @var $this yii\web\View */
/* @var $model frontend\models\Plan */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>

<div class="form-group">
    <div class="col-md-6">
        <?= $form->field($model, 'date_create')->textInput() ?>
    </div>
    <div class="col-md-6">
        <?php
        $items = CColor::find()->all();
        $items = ArrayHelper::map($items, 'id', 'color');
        echo $form->field($model, 'rapid_code')->dropDownList($items, ['prompt' => 'เลือก...']);
        ?>
    </div>
</div>

<div class="form-group">
    <div class="col-md-3">
        <?= $form->field($model, 'adl')->textInput() ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'adl_text')->textInput() ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'tai')->textInput() ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'tai_text')->textInput() ?>
    </div>
</div>

<div class="form-group">
    <div class="col-md-6">
        <?= $form->field($model, 'dx1')->textInput() ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'dx2')->textInput() ?>
    </div> 

</div>
<div class="form-group">
    <div class="col-md-12">
        <?= $form->field($model, 'drug')->textarea(['rows' => 4]) ?>
    </div>

</div>
<div class="form-group">
    <div class="col-md-6">
        <?= $form->field($model, 'patient_mind')->textarea(['rows' => 4]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'live_problem')->textarea(['rows' => 4]) ?>
    </div>
</div>

<div class="form-group">
    <div class="col-md-12">
        <?php
        if (empty($model->long_goal)) {
            $model->long_goal = CTemplate::findOne(1)->templat_text;
        }
        ?>
        <?= $form->field($model, 'long_goal')->textarea(['rows' => 14]) ?>
    </div>
</div>
<div class="form-group">
    <div class="col-md-12">
        <?php
        if (empty($model->short_goal)) {
            $model->short_goal = CTemplate::findOne(2)->templat_text;
        }
        ?>
        <?= $form->field($model, 'short_goal')->textarea(['rows' => 4]) ?>
    </div>
</div>
<div class="form-group">
    <div class="col-md-12">
        <?= $form->field($model, 'careful')->textarea(['rows' => 2]) ?>
    </div>
</div>

<div class="form-group">
    <div class="col-md-4">
        <?php
        if (empty($model->fct_care_time)) {
            $model->fct_care_time = CTemplate::findOne(3)->templat_text;
        }
        ?>
        <?= $form->field($model, 'fct_care_time')->textInput() ?>
    </div>
    <div class="col-md-4">
        <?php
        if (empty($model->cg_care_time)) {
            $model->cg_care_time = CTemplate::findOne(4)->templat_text;
        }
        ?>
        <?= $form->field($model, 'cg_care_time')->textInput() ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'budget_need')->textInput() ?>
    </div>
</div>


<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>


