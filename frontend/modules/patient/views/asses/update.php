<?php

use common\components\MyHelper;
/* @var $this yii\web\View */
/* @var $model frontend\models\Patient */

$this->title = 'แก้ไข ผลประเมิน ADL ';
?>
<div class="patient-update">

       <div class="panel panel-danger">
        <div class="panel-heading">* แก้ไข <?=MyHelper::ptInfo_($model->patient_id)?></div>
        <div class="panel-body">
            <?=
            $this->render('_form', [
                'model' => $model,
            ])
            ?>
        </div>
    </div>

</div>
