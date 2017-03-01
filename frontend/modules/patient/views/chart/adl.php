<div id="chart_adl">
    
</div>
<?php


$sql = "select * from (SELECT t.d_update 'd',t.adl_score a FROM assessment t  
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
    Highcharts.chart('chart_adl', {
        credits: {
            enabled: false
        },
        chart: {
            type: 'line',
            //width: 100%,
            //height: 300
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
                enableMouseTracking: true
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

