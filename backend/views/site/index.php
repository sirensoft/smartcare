<?php


use yii\helpers\Url;
use kartik\tabs\TabsX;

//$this->registerJs($this->render('js.js'));

$this->title = '::Backend::';
?>
<div class="site-index">
    <div style="padding: 5px"> 
        Server Time :<span id="time" style="color: white;background-color: blueviolet"><?=date('Y-m-d H:i:s')?></span> 
        ,Last Job Time :<span id="job" style="background-color: lightgreen">0000-00-00 00:00:00</span>
    </div>
  

    <?php
    $items = [
        [
            'label' => '<i class="glyphicon glyphicon-user"></i> จัดการ',
            'content' => $this->render('admin', []),
        ],
        [
            'label'=>'สถานะ MySQL',
            'content'=>$this->render('/util/process-list')
        ],
        [
            'label' => 'เกี่ยวกับ',
       
        ],
    ];
    ?>
    <div class="panel panel-warning" style="margin-top: 15px">
        <div class="panel-heading">
            <i class="glyphicon glyphicon-cog"></i> จัดการระบบ
        </div>
        <div class="panel-body" style="padding: 10px">
            <?php
            echo TabsX::widget([
                'items' => $items,
                'position' => TabsX::POS_ABOVE,
                'encodeLabels' => false
            ]);
            ?>
        </div>
    </div>

</div>
<?php
$rout_ajax_time = Url::toRoute(['util/ajax-time']);
$route_last_job_time = Url::toRoute(['util/last-job-time']);
$js = <<<JS
     
     setInterval(function(){
        $.get('$rout_ajax_time',function(data){
            $('#time').html(data);
        });
     },1000);
     
     setTimeout(function(){
        $.get('$route_last_job_time',function(data){
            $('#job').html(data);
        });
     },1000);
    

JS;

$this->registerJs($js);

?>
