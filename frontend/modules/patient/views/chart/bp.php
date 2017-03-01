<div id="chart_bp">
    
</div>

<?php


$sql = "select * from (SELECT max(t.date_visit) d,t.obj_bp a FROM visit t
WHERE t.obj_bp IS NOT NULL  AND LENGTH(TRIM(t.obj_bp)) >= 5 
AND t.patient_id = '$pid'
GROUP BY t.date_visit ORDER BY t.date_visit DESC limit 24 ) tt order by d asc";

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
    Highcharts.chart('chart_bp', {
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
            //min: 0,
            //max: 200,
            //tickInterval: 2,
            title: {
                text: 'ความดัน(ค่าบน)'
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
            name: 'ความดัน',
            data: $data,
            color:'blue',
            hasCustomFlag: true,
        }]
    });
});     
JS;

$this->registerJs($js);
?>
