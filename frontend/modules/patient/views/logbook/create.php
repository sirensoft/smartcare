<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Logbook */

$this->title = 'Create Logbook';
$this->params['breadcrumbs'][] = ['label' => 'Logbooks', 'url' => ['index','pid'=>$pid]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logbook-create">

    

    <?= $this->render('_form', [
        'model' => $model,
        'pid'=>$pid
    ]) ?>

</div>
