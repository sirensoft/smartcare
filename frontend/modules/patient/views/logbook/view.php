<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Logbook */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Logbooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logbook-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'patient_id',
            'cg_id',
            'cm_id',
            'cc:ntext',
            'pi:ntext',
            'fh:ntext',
            'ph:ntext',
            'mh:ntext',
            'nu:ntext',
            'he:ntext',
            'sh:ntext',
            'pe:ntext',
            'me:ntext',
            'pl:ntext',
            'pm:ntext',
            'co:ntext',
            'd_update',
        ],
    ]) ?>

</div>
