<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = '::Backend::';
?>
<div class="site-index">
   
    <div class="row">
        <div class="col-lg-6">
            <?=Html::a('<i class="glyphicon glyphicon-user"></i> จัดการผู้ใช้',['/user/'],['class'=>'btn btn-lg btn-danger'])?>            
        </div>
        
    </div>
   
</div>
