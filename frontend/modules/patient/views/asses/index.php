<?php
use kartik\tabs\TabsX;

echo TabsX::widget([
    'position' => TabsX::POS_ABOVE,
    'align' => TabsX::ALIGN_LEFT,
    'items' => [
        [
            'label' => 'ADL',
            'content' => $this->render('adl'),
            'active' => true
        ],
        [
            'label' => 'TAI',
            'content' => $this->render('tai'),
            
        ],
       
    ],
]);

