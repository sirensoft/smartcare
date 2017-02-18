<div id="chart_weight">
    
</div>
<?php


$sql = " SELECT t.d_update 'DATE_SERV',t.adl_score FROM assessment t  
        WHERE  t.patient_id = '$pid' order by t.d_update ASC";

$raw = \Yii::$app->db->createCommand($sql)->queryAll();
$categories = [];
$data = [];
foreach ($raw as $value) {
    $date = new DateTime($value['DATE_SERV']);
    $date = $date->format('Y-m-d');
    $categories[] =$date;
    
    $data[]=$value['adl_score']*1;
}

$categories = json_encode($categories);
$data = json_encode($data);

$js = <<<JS
   $(function () {
    Highcharts.chart('chart_weight', {
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
            min: 0,
            max: 20,
            tickInterval: 2,
            title: {
                    text: 'กิโลกรัม'
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
            name: 'น้ำหนัก',
            data: $data,
            color:'blue'
        }]
    });
});     
JS;

$this->registerJs($js);
?>

