<?php

use yii\widgets\DetailView;

$this->title = 'ข้อมูลผู้ใช้งาน';
$this->params['breadcrumbs'][] = $this->title;

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        [
            'label' => 'ชื่อ-นามสกุล',
            'value' => $model->u_prename . $model->u_name . ' ' . $model->u_lname,
        ],
        [
            'label' => 'ประเภทผู้ใช้งาน',
            'value' => $model->role_name,
        ],
        [
            'label' => 'เข้าระบบล่าสุด',
            'format'=>'datetime',
            'value' => $model->last_login,
        ],
    ]
]);

