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

            <input type="text" name="cid" id="cid" value="<?=$cid?>" placeholder="เลขบัตรประชาชน 13 หลัก">


<?php ActiveForm::end(); ?>

        </div>
        <div style="margin-top: 5px">
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

