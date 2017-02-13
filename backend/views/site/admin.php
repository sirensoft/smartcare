<?php

use yii\helpers\Html;
use frontend\modules\ehr\models\OnOffEhr;

$mEhr = OnOffEhr::find()->one();
?>
<div class="row">
    <div class="col-md-4">
        <?= Html::a('<i class="glyphicon glyphicon-user"></i> USER', ['/user/'], ['class' => 'btn btn-lg btn-primary']) ?>            
    </div>
    <div col-md-4>
        <?php if ($mEhr->status == 'on'): ?>            
            <?= Html::a('<i class="glyphicon glyphicon-off"></i> EHR', ['/site/ehr'], ['class' => 'btn btn-lg btn-success']) ?>
        <?php else : ?>
             <?= Html::a('<i class="glyphicon glyphicon-off"></i> EHR', ['/site/ehr'], ['class' => 'btn btn-lg btn-danger']) ?>
        <?php endif; ?>
    </div>

</div>