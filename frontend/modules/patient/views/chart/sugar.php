<div id="chart_sugar">
    
</div>

<?php


$sql = "select * from ( SELECT max(t.date_visit) d,t.obj_sugar a FROM visit t
WHERE t.obj_sugar > 10  AND t.patient_id = '$pid'
GROUP BY t.date_visit ORDER BY t.date_visit DESC limit 24) tt order by d asc ";

$raw = \Yii::$app->db->createCommand($sql)->queryAll();
$categories = [];
$data = [];
foreach ($raw as $value) {
    $date = new DateTime($value['d']);
    $date = $date->format('Y-m-d');
    $categories[] =$date;
    
    $data[]=$value['a']*1;
}

$categories = json_encode($categories);
$data = json_encode($data);

$js = <<<JS
   $(function () {
    Highcharts.chart('chart_sugar', {
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
            //min: 20,
            //max: 300,
            //tickInterval: 5,
            title: {
                text: 'ค่าน้ำตาลในเลือด'
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
            name: 'น้ำตาล',
            data: $data,
            color:'blue'
        }]
    });
});     
JS;

$this->registerJs($js);
?>

