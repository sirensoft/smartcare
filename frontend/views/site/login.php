<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    

   

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

              

                <div class="form-group">
                    <?= Html::a('<i class="glyphicon glyphicon-user"></i> สมัครผู้ใช้', ['/site/signup'],['class' => 'btn btn-info'])?>
                    <?= Html::submitButton('<i class="glyphicon glyphicon-ok"></i> Login', ['class' => 'btn btn-danger', 'name' => 'login-button']) ?>
                    
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
