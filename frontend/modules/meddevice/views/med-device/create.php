<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\meddevice\models\MedDevice */

$this->title = 'Create Med Device';
$this->params['breadcrumbs'][] = ['label' => 'Med Devices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="med-device-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
