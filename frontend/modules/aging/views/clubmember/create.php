<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\ClubMember */

$this->title = 'เพิ่มเข้าเป็นสมาชิก';
$this->params['breadcrumbs'][] = ['label' => 'รายการชมรม', 'url' => ['index','cid'=>$cid,'person_name'=>$person_name]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="club-member-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
