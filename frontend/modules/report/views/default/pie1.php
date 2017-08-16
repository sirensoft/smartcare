<?php

use yii\helpers\Html;
use miloschuman\highcharts\HighchartsAsset;
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

HighchartsAsset::register($this)->withScripts([
    'highcharts-more',
        //'themes/grid'
]);

$this->title = 'รายงาน';
$this->params['breadcrumbs'][] = ['label' => 'รายงาน', 'url' => ['/report/']];
$this->params['breadcrumbs'][] = "เปรียบเทียบจำนวนผู้สูงอายุแยกรายกลุ่ม";
?>
<?php

$sql = "select * from pie1";
$raw = \Yii::$app->db->createCommand($sql)->queryAll();
$data=[];
foreach ($raw as $value) {
    $data[]=['name'=>$value['name'],'y'=>$value['y']*1,'color'=>$value['color']];
}


?>
<div id="chart"></div>
<div>
    <?php
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data
        ]);
        echo GridView::widget([
            'dataProvider'=>$dataProvider,
            'layout'=>'{items}',
            'columns'=>[
                'name:text:#',
                'y:integer:จำนวน'
            ]
        ]);
    
    ?>
</div>
<?php
$json = json_encode($data);
$js = <<<JS
// Radialize the colors
Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
    return {
        radialGradient: {
            cx: 0.5,
            cy: 0.3,
            r: 0.7
        },
        stops: [
            [0, color],
            [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
        ]
    };
});

// Build the chart
Highcharts.chart('chart', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    credits:false,
    title: {
        text: 'ปีงบประมาณ 2560'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                },
                connectorColor: 'silver'
            }
        }
    },
    series: [{
        name: 'ร้อยละ',
        data: $json
    }]
});
JS;

$this->registerJs($js);

