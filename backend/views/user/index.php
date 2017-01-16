<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> เพิ่ม USER', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
     'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'username:text:user',
           // 'auth_key',
            'password_hash:text:pass',
            //'password_reset_token',
            // 'email:email',
             'status',
            // 'role',
             'role_name:text:กลุ่ม',
             //'u_cid:text:cid',
             'u_prename:text:คำนำ',
             'u_name:text:name',
             'u_lname:text:lname',
             'office:text:หน่วยบริการ',
             //'officer_type:text:ประเภท',
             'office_position:text:ตำแหน่ง',
             'last_login',
            // 'created_at',
             //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
