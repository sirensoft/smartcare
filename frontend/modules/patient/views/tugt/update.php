<?php

use yii\helpers\Html;
use common\components\MyHelper;
/* @var $this yii\web\View */
/* @var $model frontend\models\Tugt */


$this->params['breadcrumbs'][] = ['label' =>  MyHelper::ptInfo_($model->patient_id) , 'url' => ['index','pid'=>$model->patient_id]];

$this->params['breadcrumbs'][] = 'แก้ไขผลการคัดกรองภาวะหกล้ม';
?>
<div class="tugt-update">

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
