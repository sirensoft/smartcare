<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\MyHelper;
use frontend\models\CTemplateLogbook;
use frontend\models\Patient;

/* @var $this yii\web\View */
/* @var $model frontend\models\Logbook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="logbook-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //$form->field($model, 'id')->textInput() ?>

    <?php //$form->field($model, 'patient_id')->textInput() ?>

    <?php //$form->field($model, 'cg_id')->textInput() ?>

    <?php //$form->field($model, 'cm_id')->textInput() ?>
    
    <?php
    if(empty($model->pp)){
        $pp = CTemplateLogbook::findOne(1)->templat_text;
        $pt = Patient::findOne($pid);
        $pp = str_replace('name', $pt->fullname, $pp);
        $pp = str_replace('age', $pt->age_y, $pp);
        $pp = str_replace('birth', $pt->birth, $pp);
        $pp = str_replace('addr', $pt->house_no, $pp);
        $pp = str_replace('vill', $pt->village_no." ".$pt->village_name, $pp);
        $pp = str_replace('tmb', $pt->subdistrict, $pp);
        $pp = str_replace('amp', $pt->district, $pp);
        $pp = str_replace('prov', $pt->province, $pp);
        $pp = str_replace('cousin', $pt->cousin, $pp);
        $pp = str_replace('tel', $pt->tel, $pp);        
        
        $model->pp = $pp;
    }
    ?>
    <?= $form->field($model, 'pp')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'cc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fh')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ph')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mh')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nu')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'he')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sh')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pe')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'me')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pl')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pm')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'co')->textarea(['rows' => 6]) ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
