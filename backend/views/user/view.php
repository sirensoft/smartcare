<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

   

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
         'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
        'attributes' => [
            'id',
            'username',
            //'auth_key',
            'password_hash',
            //'password_reset_token',
            'email',
            'status',
            //'role',
            'role_name',
            'u_cid',
            'fullname',
            //'u_prename',
            //'u_name',
            //'u_lname',
            'office',
            'officer_type',
            'office_position',
            //'created_at',
            //'updated_at',
            'last_login'
        ],
    ]) ?>

</div>
