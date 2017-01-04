<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Patient */

$this->title = 'เพิ่มผู้ป่วย';
$this->params['breadcrumbs'][] = ['label' => 'รายชื่อ', 'url' => ['index']];
//$this->params['breadcrumbs'][] = 'เพิ่ม';
?>
<div class="patient-create">

    <div class="panel panel-warning">
        <div class="panel-heading">เพิ่มผู้ป่วย</div>
        <div class="panel-body">
            <?=
            $this->render('_form', [
                'model' => $model,
            ])
            ?>
        </div>
    </div>



</div>
