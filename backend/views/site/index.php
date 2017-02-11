<?php


use yii\helpers\Url;
use kartik\tabs\TabsX;

//$this->registerJs($this->render('js.js'));

$this->title = '::Backend::';
?>
<div class="site-index">
    <div> Server Time : 
        <span id="time">
        <?=date('Y-m-d H:i:s')?>
        </span>
    </div>

    <?php
    $items = [
        [
            'label' => '<i class="glyphicon glyphicon-user"></i> จัดการ USER',
            'content' => $this->render('admin', []),
        ],
        [
            'label' => 'เกี่ยวกับ',
        //'content' => $this->render('admin', []),
        ],
    ];
    ?>
    <div class="panel panel-success" style="margin-top: 15px">
        <div class="panel-heading">
            <i class="glyphicon glyphicon-cog"></i> จัดการระบบ
        </div>
        <div class="panel-body">
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
$js = <<<JS
     
     setInterval(function(){
        $.get('$rout_ajax_time',function(data){
            $('#time').html(data);
        });
     },1000);
    

JS;

$this->registerJs($js);

?>
