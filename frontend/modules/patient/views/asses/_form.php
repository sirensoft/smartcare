<?php

use kartik\widgets\ActiveForm;


?>



<?php
$form = ActiveForm::begin(['type' => ActiveForm::TYPE_VERTICAL]);
?>
<?=$form->field($model,'date_serv')?>
<?=$form->field($model,'adl_score')?>
<?=$form->field($model,'pp_code')?>



<button type="submit"> Update </button>


<?php ActiveForm::end(); ?>



