<div id="chart_weight">
    
</div>
<?php


$sql = " select * from (SELECT max(t.date_visit) d,t.obj_weight a FROM visit t
WHERE t.obj_weight > 10 AND t.patient_id = '$pid'
GROUP BY t.date_visit ORDER BY t.date_visit DESC limit 24) tt order by d asc ";

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
    Highcharts.chart('chart_weight', {
        credits: {
            enabled: false
        },
        chart: {
            type: 'line',
          
        },
        title: {
            text: ' '
        },
        
        xAxis: {
            categories: $categories
        },
        yAxis: {
            //min: 10,
            //max: 200,
            tickInterval: 10,
            title: {
                    text: 'กิโลกรัม'
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
            name: 'น้ำหนัก',
            data: $data,
            color:'blue'
        }]
    });
});     
JS;

$this->registerJs($js);
?>

