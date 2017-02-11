<?php

use yii\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\widgets\Pjax;

$sql = " show processlist;";
$raw = \Yii::$app->db->createCommand($sql)->queryAll();
$dataProvider = new ArrayDataProvider([
    'allModels'=>$raw
]);

?>

<?php
echo GridView::widget([
    'dataProvider'=>$dataProvider,
    'columns'=>[
        'Id',
        'User',
        'Host',
        'db',
        'Command',
        'Time',
        'Info'
        
    ]
]);
?>


