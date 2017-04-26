<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\ClubMember */

$this->title = $person_name;
$this->params['breadcrumbs'][] = ['label' => 'รายการชมรม', 'url' => ['index','cid'=>$cid,'person_name'=>$person_name]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="club-member-view">

    

    <p>
        <?= Html::a('Update', ['update', 'cid' => $model->cid, 'club_id' => $model->club_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'cid' => $model->cid, 'club_id' => $model->club_id,'person_name'=>NULL], [
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
            'cid',
            'club.name',
            'date_begin',
            'date_end',
            'note:ntext',
        ],
    ]) ?>

</div>
