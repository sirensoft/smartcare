<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\widgets\ActiveForm;
use kartik\grid\GridView;

$this->title = "ค้นหา...";
?>
<div class="panel">
    <div class="panel-body">
        <div>
            <?php
            $f = ActiveForm::begin([
            ]);
            ?>

            เลข 13 หลัก<input type="text" name="cid" id="cid" value="<?=$cid?>">


<?php ActiveForm::end(); ?>

        </div>
        <div>
            <?php if (!empty($dataProvider)): ?>
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider
                ])
                ?>
            <?php endif; ?>
        </div>
    </div>   

</div>

