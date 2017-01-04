<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\components\MyHelper;
use kartik\select2\Select2;
?>
<div class="row">
    <div class="col-lg-6">
        <?= Html::img('./web_img/tai.png'); ?>
    </div>
    <div class="col-lg-6">

        <form method="POST">
            <div class="row">
                <div class="form-group col-lg-4" >
                    <label for="adl_score">ผลประเมิน ADL:</label>
                    <input type="text" class="form-control" id="adl_score" name="adl_score" placeholder="ค่าจากประเมิน ADL">
                </div>
                <div class="form-group col-lg-4" >
                    <label for="tai_class">ผลประเมิน TAI:</label>
                    <?php
                    $items = MyHelper::dropDownItems("select id,val from c_tai", 'id', 'val');
                    ?>

                    <?php
                    echo Select2::widget([
                        'name' => 'tai_class',
                        'data' => $items,
                        'options' => ['placeholder' => 'เลือก...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-4" >
                    <button type="submit" class="btn btn-default"> บันทึกผล </button>
                </div>
            </div>
        </form>



    </div>
</div>




