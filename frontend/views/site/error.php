<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = "ERROR";
?>
<div class="site-error">

   

    <div class="alert alert-danger">
        <h3><?= nl2br(Html::encode($message)) ?></h3>
    </div>

    

</div>
