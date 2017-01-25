<?php

use yii\helpers\Html;
use common\components\MyHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Patient */

$this->title = 'จำหน่าย: ' . $model->name." ".$model->lname;
$this->params['breadcrumbs'][] = ['label' => 'รายชื่อ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' =>  MyHelper::ptInfo_($model->id), 'url' => ['view', 'pid' => $model->id]];
$this->params['breadcrumbs'][] = "จำหน่าย";
?>
<div class="patient-update">

       <div class="panel panel-danger">
        <div class="panel-heading">* รายละเอียดการจำหน่าย</div>
        <div class="panel-body">
            <?=
            $this->render('_form_discharge', [
                'model' => $model,
            ])
            ?>
        </div>
    </div>

</div>
