<?php

use yii\helpers\Html;
use common\components\MyHelper;


/* @var $this yii\web\View */
/* @var $model frontend\models\Visit */

$this->title = 'เพิ่มการเยี่ยม: '.MyHelper::ptInfo_($model->patient_id);
$this->params['breadcrumbs'][] = ['label' => MyHelper::ptInfo_($model->patient_id), 'url' =>['/patient/patient/view','pid'=>$model->patient_id]];
$this->params['breadcrumbs'][] = ['label' => 'รายการเยี่ยม', 'url' => ['index','pid'=>$model->patient_id]];
$this->params['breadcrumbs'][] = 'เพิ่มการเยี่ยม';
?>
<div class="visit-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
