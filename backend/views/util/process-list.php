<?php

use kartik\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\widgets\Pjax;
use yii\helpers\Html;
?>

<?php Pjax::begin(); ?>
<?= Html::a("Refresh", ['/util/process-list'], ['id' => 'refreshButton','style'=>'display']) ?>
<?php
$sql = " show processlist;";
$raw = \Yii::$app->db->createCommand($sql)->queryAll();
$dataProvider = new ArrayDataProvider([
    'allModels'=>$raw
]);

?>

<?php
echo GridView::widget([
    'responsiveWrap' => false,
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
<?php Pjax::end(); ?>

<?php
$script = <<< JS
$(document).ready(function() {
    setInterval(function(){ $("#refreshButton").click(); }, 5000);
});
JS;
$this->registerJs($script);
?>


