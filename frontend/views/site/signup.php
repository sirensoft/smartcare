<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'ลงทะเบียนผู้ใช้';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    
    <div class="row">             
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            
            <?= $form->field($model, 'u_cid')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'u_prename')->textInput() ?>
            <?= $form->field($model, 'u_name')->textInput() ?>
            <?= $form->field($model, 'u_lname')->textInput() ?>
            <?= $form->field($model, 'email') ?>
            <?=$form->field($model, 'office')->textInput()?>
            <?= $form->field($model, 'username')->textInput() ?>        

            <?= $form->field($model, 'password')->passwordInput() ?>
            

            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
