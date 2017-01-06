<?php


$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Plans', 'url' => ['index','pid'=>$model->patient_id]];
$this->params['breadcrumbs'][] = $this->title;


use kartik\tabs\TabsX;

echo TabsX::widget([
    'position' => TabsX::POS_ABOVE,
    'align' => TabsX::ALIGN_LEFT,
    'items' => [
        [
            'label' => 'CARE PLAN',
            'content' => $this->render('view',[
                'model'=>$model
            ]),
            'active' => true
        ]
        
    ],
]);
