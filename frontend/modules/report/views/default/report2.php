<?php

$this->title = 'รายงาน';
$this->params['breadcrumbs'][] = ['label' => 'รายงาน', 'url' => ['/report/']];
$this->params['breadcrumbs'][] = 'รายงานผลการดูแลรายคน';

use kartik\grid\GridView;

echo GridView::widget([
    'panel'=>[
        'before'=>''
    ],
    'dataProvider' => $dataProvider,
    'responsiveWrap' => false,
    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
]);

