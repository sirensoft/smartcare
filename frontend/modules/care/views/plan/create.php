<?php

use yii\helpers\Html;
use common\components\MyHelper;


/* @var $this yii\web\View */
/* @var $model frontend\models\Plan */

$this->title = MyHelper::ptInfo_($model->patient_id);
$this->params['breadcrumbs'][] = ['label' => 'รายการแผน', 'url' => ['index','pid'=>$model->patient_id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="plan-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
