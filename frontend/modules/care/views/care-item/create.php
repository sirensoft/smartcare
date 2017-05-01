<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\CareItem */

$this->title = 'Create Care Item';
$this->params['breadcrumbs'][] = ['label' => 'Care Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="care-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
