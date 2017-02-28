<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
    ],
    'modules' => require(__DIR__ . '/modules.php'),
    'language'=>'th-TH',
    'timeZone' => 'Asia/Bangkok'
    
    /* ที่ server
     extension=php_intl.dll
     [intl] 
     intl.default_locale =th_TH.UTF-8
     */
];
