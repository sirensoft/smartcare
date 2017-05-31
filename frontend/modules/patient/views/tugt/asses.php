<?php
use kartik\tabs\TabsX;
use common\components\MyHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Html;


$this->params['breadcrumbs'][] = ['label'=>  MyHelper::ptInfo_($pid),'url'=>['/patient/patient/view','pid'=>$pid]];
$this->params['breadcrumbs'][] = ['label'=>'การคัดกรองภาวะหกล้ม Timed Up and Go Test'];
?>
<div>
    <p>ให้ผู้สูงอายุลุกขึ้นจากเก้าอี้ที่มีที่ท้าวแขน เดินเป็นเส้นตรงระยะทาง 3 เมตร หมุนตัวและเดินกลับมานั่งที่เดิม</p>
   <?=Html::img('./images/tugt.png',['width'=>'500','height'=>'250'])?>
    
</div>
<div style="margin-top: 15px">
   <?php $form = ActiveForm::begin(); ?>
        <input type='hidden' name='patient_id' id="patient_id" value="<?=$pid?>">
        <p>
        ใช้เวลา: <input type="number" name='walk_time' id="walk_time"> วินาที
        </p>
        <p>การพิจารณา : ถ้าใช้เวลา <b>30</b> วินาทีขึ้นไป เท่ากับ <b>มีความเสี่ยง</b></p>
        
        <p class="pull-left">
            <?=  Html::a('ยกเลิก',['/patient/tugt/index','pid'=>$pid],['class'=>'btn btn-default'])?>
       
            <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-ok"></i> บันทึก</button>
        </p>
   <?php ActiveForm::end(); ?>
</div>
<?php
$this->registerJs($this->render('script.js'));
?>

