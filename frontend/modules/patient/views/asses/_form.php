<?php

use kartik\widgets\ActiveForm;
use yii\helpers\Html;

?>



<?php
$form = ActiveForm::begin(['type' => ActiveForm::TYPE_VERTICAL]);
?>
<?=$form->field($model,'date_serv')?>
<?=$form->field($model,'adl_score')?>
<?=$form->field($model,'pp_code')?>
<?=$form->field($model,'tai_class')?>
<?=$form->field($model,'group_text')?>


<?php
       
        echo Html::a('<i class="glyphicon glyphicon-remove"></i> ลบ', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-sm',
            'data' => [
                'confirm' => 'ยืนยันการลบข้อมูล!',                
                'method' => 'post',
            ],
        ])
 ?>

<button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-ok"></i> บันทึก</button>
<?php
$url = \Yii::$app->request->referrer;
?>
<?= Html::a('<i class="glyphicon glyphicon-repeat"></i> ยกเลิก', $url,['class'=>'btn btn-sm btn-info pull-right']);?>


<?php ActiveForm::end(); ?>



