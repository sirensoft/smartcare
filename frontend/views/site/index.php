<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">
        <?php
        if(!\Yii::$app->user->isGuest){
            echo \Yii::$app->user->identity->role;
        }
        
        ?>
        
    </div>

    
</div>
