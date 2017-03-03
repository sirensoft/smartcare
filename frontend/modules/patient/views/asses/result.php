<?php

use yii\data\ArrayDataProvider;
use kartik\grid\GridView;
use miloschuman\highcharts\HighchartsAsset;

HighchartsAsset::register($this)->withScripts([
    //'highstock',
    'modules/exporting',
        //'modules/drilldown'
]);

$sql = " SELECT t.date_serv 'DATE_SERV',t.adl_score,t.pp_code,tai_score,t.tai_class,t.group_text,t.note
,concat(u.u_prename,u.u_name,' ',u.u_lname) provider FROM assessment t 
LEFT JOIN `user` u on u.id = t.provider_id
WHERE  t.patient_id = '$pid' order by t.id DESC";

$raw = \Yii::$app->db->createCommand($sql)->queryAll();

$dataProvider = new ArrayDataProvider([
    'allModels' => $raw,
    'pagination' => [
        'pageSize' => 10
    ]
        ]);

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'responsiveWrap' => false,
    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'DATE_SERV:date:วันที่ประเมิน',
        'adl_score:integer:ADL SCORE',
        'tai_class:text:TAI CLASS',
        'group_text:text:จัดกลุ่ม',
        'pp_code:text:SPECIALPP',
        'provider:text:ผู้ประเมิน',
        'note:text:หมายเหตุ'
    ]
]);
?>

<div class="panel panel-info">
    <div class="panel-heading">
        แผนภูมิแสดงคะแนนประเมิน ADL
    </div>
    <div class="panel-body" id='chart'>

    </div>

</div>
<?php
$sql = " select * from (SELECT t.d_update 'd',t.adl_score a FROM assessment t  
        WHERE  t.patient_id = '$pid' ORDER BY t.d_update DESC limit 24) tt order by d asc";

$raw = \Yii::$app->db->createCommand($sql)->queryAll();
$categories = [];
$data = [];
foreach ($raw as $value) {
    $date = new DateTime($value['d']);
    $date = $date->format('Y-m-d');
    $date = \Yii::$app->formatter->asDate($date);
    $categories[] =$date;
    
    $data[]=$value['a']*1;
}

$categories = json_encode($categories);
$data = json_encode($data);

$js = <<<JS
   $(function () {
    Highcharts.chart('chart', {
        chart: {
            type: 'line',
            //width: 100%,
            height: 300
        },
        title: {
            text: ' '
        },
        
        xAxis: {
            categories: $categories
        },
        yAxis: {
            min: 0,
            max: 20,
            tickInterval: 2,
            title: {
                text: 'ADL SCORE'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'ADL',
            data: $data,
            color:'blue'
        }]
    });
});     
JS;

$this->registerJs($js);
?>


