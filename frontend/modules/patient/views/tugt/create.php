<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Tugt */

$this->title = 'Create Tugt';
$this->params['breadcrumbs'][] = ['label' => 'Tugts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tugt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
