<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Patient */

$this->title = 'แก้ไข: ' . $model->name." ".$model->lname;
$this->params['breadcrumbs'][] = ['label' => 'รายชื่อ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' =>$model->name." ".$model->lname, 'url' => ['view', 'pid' => $model->id]];

?>
<div class="patient-update">

       <div class="panel panel-danger">
        <div class="panel-heading">* แก้ไข</div>
        <div class="panel-body">
            <?=
            $this->render('_form', [
                'model' => $model,
            ])
            ?>
        </div>
    </div>

</div>
