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


<button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-ok"></i> บันทึก</button>


<?php ActiveForm::end(); ?>



