<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ClubMemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ชมรม: '.$person_name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="club-member-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เข้าร่วมสมาชิกชมรม', ['create','cid'=>$cid,'person_name'=>$person_name], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'cid',
            'club.name',
            'date_begin',
            'date_end',
            'note:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
