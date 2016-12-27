<?php

/* @var $this yii\web\View */

$this->title = 'SmartCare V 1.161227';
?>
<div class="site-index">

    <div class="body-content">
        <?php
        if(!\Yii::$app->user->isGuest){
            //echo \Yii::$app->user->identity->role;
            echo \Yii::$app->user->identity->role_name;
        }
        
        ?>
        
    </div>

    
</div>
