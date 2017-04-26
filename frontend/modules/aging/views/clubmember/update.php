<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ClubMember */

$this->title = 'แก้ไข: ' . $model->cid;
$this->params['breadcrumbs'][] = ['label' => 'รายการชมรม', 'url' => ['index','cid'=>$cid,'person_name'=>$person_name]];
$this->params['breadcrumbs'][] = ['label' => $model->cid, 'url' => ['view', 'cid' => $model->cid, 'club_id' => $model->club_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="club-member-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
