<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Patient', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cid',
            'prename',
            'name',
            'lname',
            'birth',
            // 'province',
            // 'district',
            // 'subdistrict',
            // 'village_no',
            // 'village_name',
            // 'house_no',
            // 'typearea',
            // 'nation',
            // 'region',
            // 'discharge',
            // 'dupdate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
