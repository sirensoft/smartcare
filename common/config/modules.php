<?php

return [
    'gridview' => [
        'class' => '\kartik\grid\Module'
    ],
    'patient' => [
        'class' => 'frontend\modules\patient\Patient',
    ],
    'care' => [
        'class' => 'frontend\modules\care\Care',
    ],
    'test' => [
        'class' => 'frontend\modules\test\Test',
    ],
    'report' => [
        'class' => 'frontend\modules\report\Report',
    ],
    'health' => [
        'class' => 'frontend\modules\health\Health',
    ],
    'map' => [
        'class' => 'frontend\modules\map\Map',
    ],
    'api' => [
        'class' => 'frontend\modules\api\Api',
    ],
    'ajax' => [
        'class' => 'frontend\modules\ajax\Ajax',
    ],
];

