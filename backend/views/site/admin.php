<?php
use yii\helpers\Html;

?>
<div class="row">
    <div class="col-md-4">
        <?= Html::a('<i class="glyphicon glyphicon-user"></i> จัดการผู้ใช้', ['/user/'], ['class' => 'btn btn-lg btn-success']) ?>            
    </div>
    <div col-md-4>
        <?= Html::a('<i class="glyphicon glyphicon-off"></i> On/Off EHR', ['/site/ehr'], ['class' => 'btn btn-lg btn-danger']) ?>
    </div>

</div>