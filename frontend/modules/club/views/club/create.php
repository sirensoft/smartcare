<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Club */

$this->title = 'เพิ่มชมรม';
$this->params['breadcrumbs'][] = ['label' => 'ชมรม', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="club-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
