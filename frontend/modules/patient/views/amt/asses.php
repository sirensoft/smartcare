<?php
use kartik\tabs\TabsX;
use common\components\MyHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Html;


$this->params['breadcrumbs'][] = ['label'=>  MyHelper::ptInfo_($pid),'url'=>['/patient/patient/view','pid'=>$pid]];
$this->params['breadcrumbs'][] = ['label'=>'การทดสอบสภาพสมอง Abbreviated Mental Test'];
?>
<div>
    <table class="table table-bordered table-hover">
        <thead>
        <th>#</th><th width="600">คำถาม</th><th>ใส่ /เมื่อตอบถูก</th>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>อายุเท่าไร</td>
                <td><input type="checkbox" name="a1" value="1"></td>
            </tr>
              <tr>
                <td>2</td>
                <td>ขณะนี้เวลาเท่าไร</td>
                <td><input type="checkbox" name="a2" value="1"></td>
            </tr>
               <tr>
                <td>3</td>
                <td>ที่อยู่ปัจจุบันของท่านคือ</td>
                <td><input type="checkbox" name="a3" value="1"></td>
            </tr>
                <tr>
                <td>4</td>
                <td>ปีนี้ ปีอะไร</td>
                <td><input type="checkbox" name="a4" value="1"></td>
            </tr>
                <tr>
                <td>5</td>
                <td>สถานที่ตรงนี้เรียกว่าอะไร</td>
                <td><input type="checkbox" name="a5" value="1"></td>
            </tr>
                <tr>
                <td>6</td>
                <td>คนนี้คือใคร(ชี้ที่คนสัมภาษณ์) และคนนี้คือใคร(ชี้ที่คนใกล้ๆหรือญาติ)</td>
                <td><input type="checkbox" name="a6" value="1"></td>
            </tr>
                <tr>
                <td>7</td>
                <td>วันเดือนปีเกิดของท่านคือ</td>
                <td><input type="checkbox" name="a7" value="1"></td>
            </tr>
                <tr>
                <td>8</td>
                <td>เหตุการณ์ 14 ตุลาคม หรือวันมหาวิปโยค เกิดในปี พ.ศ.อะไร</td>
                <td><input type="checkbox" name="a8" value="1"></td>
            </tr>
                <tr>
                <td>9</td>
                <td>พระมาหากษัตริย์องค์ปัจจุบันมีพระนามว่าอะไร</td>
                <td><input type="checkbox" name="a9" value="1"></td>
            </tr>
                <tr>
                <td>10</td>
                <td>ให้นับถอยหลังจากเลข 20 จนถึง 1</td>
                <td><input type="checkbox" name="a10" value="1"></td>
            </tr>
            
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">ผลการทดสอบ : <strong><span id="res"></span></strong></td>
            </tr>
        </tfoot>
    </table>
    
</div>
<div>
   <?php $form = ActiveForm::begin(); ?>
        <input type='hidden' name='patient_id' id="patient_id" value="<?=$pid?>">
        <input type='hidden' name='amt_text' id='amt_text'>
        <input type='hidden' name='specialpp_code' id='specialpp_code'>
        <p class="pull-left">
            <?=  Html::a('ยกเลิก',['/patient/amt/index','pid'=>$pid],['class'=>'btn btn-default'])?>
        </p>
        <p class="pull-right">
            <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-ok"></i> บันทึก</button>
        </p>
   <?php ActiveForm::end(); ?>
</div>
<?php
$this->registerJs($this->render('script.js'));
?>

