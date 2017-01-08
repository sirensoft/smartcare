<?php

use yii\helpers\Html;
use common\components\MyHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Patient */

$this->title = 'แก้ไข: ' . $model->name." ".$model->lname;
$this->params['breadcrumbs'][] = ['label' => 'รายชื่อ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' =>  MyHelper::ptInfo_($model->id), 'url' => ['view', 'pid' => $model->id]];
$this->params['breadcrumbs'][] = "แก้ไข";
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
