<?php

use common\components\MyHelper;
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\bootstrap\Tabs;
use miloschuman\highcharts\HighchartsAsset;

HighchartsAsset::register($this)->withScripts(['modules/exporting', 'modules/drilldown']);

$this->title = MyHelper::ptInfo_($pid);
?>

<div class="panel panel-success">
    <div class="panel-heading">
<?= MyHelper::ptInfoDiv($pid) ?>
    </div>
    <div class="panel-body">
<?php
echo TabsX::widget([
    //'position' => TabsX::POS_ABOVE,
    //'align' => TabsX::ALIGN_LEFT,
  
    'items' => [
        [
            'label' => 'ADL',
            'content' => $this->render('adl', [
                'pid' => $pid
            ]),
        ],
        [
            'label' => 'น้ำหนัก',
            'content' => $this->render('weight', [
                'pid' => $pid
            ]),
        ],
        [
            'label' => 'รอบเอว',
            'content' => $this->render('waist', [
                'pid' => $pid
            ]),
        ],
        [
            'label' => 'ความดัน',
            'content' => $this->render('bp', [
                'pid' => $pid
            ]),
        ],
        [
            'label' => 'น้ำตาล',
            'content' => $this->render('sugar', [
                'pid' => $pid
            ]),
        ]
    ],
]);
?>

    </div>

</div>
<?php
$js = <<<JS
    $("#chart_adl").width('100%');
    $("#chart_weight").width('95%');
    $("#chart_bp").width('95%');
    $("#chart_sugar").width('95%');
     $("#chart_waist").width('95%');
JS;

$this->registerJs($js)

?>

