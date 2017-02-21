<?php

use kartik\widgets\ActiveForm;
use kartik\helpers\Html;
use kartik\widgets\Select2;
use common\components\MyHelper;
use kartik\form\ActiveField;
use kartik\date\DatePicker;
use yii\web\JsExpression;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

$css = <<< CSS
.alignment
{
    margin-top:25px;
}
CSS;
$this->registerCss($css);
?>



<?php
$form = ActiveForm::begin(['type' => ActiveForm::TYPE_VERTICAL]);
?>
<div class="form-group">
    <div class="col-sm-4 ">
        <?php if ($model->isNewRecord): ?>
            <div class="input-group">
                <?= $form->field($model, 'cid'); ?>            
                <span class="input-group-btn">

                    <button class="btn btn-default alignment" type="button" id="btn_find_hdc" >
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </span>           
            </div>
        <?php else: ?>
            <?= $form->field($model, 'cid'); ?>     
        <?php endif; ?>
    </div>

    <div class="col-sm-2">
        <?php
        $items = MyHelper::dropDownItems(" SELECT t.prename id,t.prename val from c_prename t ", 'id', 'val');
        echo $form->field($model, 'prename')->widget(Select2::classname(), [
            'data' => $items,
            'language' => 'th',
            'options' => ['placeholder' => 'เลือก ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>
    </div>

    <div class="col-sm-3">
        <?= $form->field($model, 'name')->textInput() ?>
    </div>

    <div class="col-sm-3">
        <?= $form->field($model, 'lname')->textInput() ?>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-3">
        <?= $form->field($model, 'sex')->dropDownList(['ชาย' => 'ชาย', 'หญิง' => 'หญิง'], ['prompt' => 'เพศ']) ?>
    </div>
    <div class="col-sm-3">
        <?php
        echo $form->field($model, 'birth')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'วดป.เกิด...'],
            'pickerButton' => [
                'icon' => 'ok',
            ],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]);
        ?>
    </div>
    <div class="col-sm-3">
        <?php
        echo $form->field($model, 'province')->textInput();
        ?>
    </div>
    <div class="col-sm-3">
        <?php
        echo $form->field($model, 'district')->textInput();
        ?>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-2">
        <?= $form->field($model, 'subdistrict')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-2">
        <?= $form->field($model, 'village_no')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-2">

        <?= $form->field($model, 'village_name')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-sm-2">
        <?= $form->field($model, 'house_no')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-2">
        <?= $form->field($model, 'lat')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-2">
        <div class="input-group">
            <?= $form->field($model, 'lon')->textInput(['maxlength' => true]) ?>
            <span class="input-group-btn">

                <button class="btn btn-default alignment" type="button" id="btn_find_map" >
                    <i class="glyphicon glyphicon-map-marker"></i>
                </button>
            </span
        </div>
    </div>  

</div>

<div class="form-group">
    <div class="col-sm-3">  
        <?php
        $sql = "SELECT t.typeareacode id,concat(t.typeareacode,'-',t.typeareaname) val from c_typearea t ";
        $items = MyHelper::dropDownItems($sql, 'id', 'val');
        echo $form->field($model, 'typearea')->widget(Select2::classname(), [
            'data' => $items,
            'language' => 'th',
            'options' => ['placeholder' => 'เลือก ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>
    </div>

    <div class="col-sm-2">
        <?php
        $items = MyHelper::dropDownItems("SELECT t.nationname id,t.nationname val from c_nation t", 'id', 'val');

        echo $form->field($model, 'nation')->widget(Select2::classname(), [
            'data' => $items,
            'language' => 'th',
            'options' => ['placeholder' => 'เลือก ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>
    </div>
    <div class="col-sm-2">
        <?=
        $form->field($model, 'race')->widget(Select2::classname(), [
            'data' => $items,
            'language' => 'th',
            'options' => ['placeholder' => 'เลือก ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>
    </div>
    <div class="col-sm-2">
        <?= $form->field($model, 'religion')->textInput() ?>
    </div>
    <div class="col-sm-3">
        <?= $form->field($model, 'mstatus')->textInput() ?>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-3">   
        <?= $form->field($model, 'hospcode')->textInput() ?>
    </div>
    <div class="col-sm-3">  
        <?= $form->field($model, 'refer_from')->textInput() ?>
    </div>
    <div class="col-sm-3">  
        <?= $form->field($model, 'disease')->textInput() ?>
    </div>
    <div class="col-sm-3">  
        <?php
        $sql = "SELECT t.dischargecode id , concat(t.dischargecode,'-',t.dischargedesc) val from c_discharge t";
        if($model->isNewRecord){
          $sql = "SELECT t.dischargecode id , concat(t.dischargecode,'-',t.dischargedesc) val from c_discharge t where t.dischargecode=9";   
        }
        $items = MyHelper::dropDownItems($sql, 'id', 'val');

        echo $form->field($model, 'discharge')->widget(Select2::classname(), [
            'data' => $items,
            'language' => 'th',
            'options' => ['placeholder' => 'เลือก ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>
    </div>

</div>

<div class="form-group">
    <div class="col-sm-6"> 
        <?= $form->field($model, 'cousin')->textInput() ?>
    </div>
    <div class="col-sm-3"> 
        <?= $form->field($model, 'tel')->textInput() ?>
    </div>
    <div class="col-sm-3"> 
        <?php
        $office = MyHelper::getUserOffice();
        $sql = " SELECT t.id,CONCAT(t.u_prename,t.u_name,' ',t.u_lname) val FROM `user` t 
WHERE t.role = 3 AND t.office = '$office' ";
        $items = MyHelper::dropDownItems($sql, 'id', 'val');
        ?>
        <?=
        $form->field($model, 'cg_id')->widget(Select2::classname(), [
            'data' => $items,
            'language' => 'th',
            'options' => ['placeholder' => 'เลือก ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>
    </div>
</div>


<div class="form-group">
    <div class="col-sm-3"> 

        <?= Html::submitButton($model->isNewRecord ? '<i class="glyphicon glyphicon-ok"></i> เพิ่ม' : '<i class="glyphicon glyphicon-ok"></i> บันทึก ', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('ยกเลิก', ['/patient/patient/index'], ['class' => 'btn btn-default']); ?>
    </div> 
</div>

<?= $form->field($model, 'dupdate')->hiddenInput(['value' => date('Y-m-d')])->label(FALSE) ?>
<?php ActiveForm::end(); ?>

<?php
$route = Url::toRoute(['/patient/patient/find-hdc']);

$lat = $model->lat;
$lon = $model->lon;
$route_map = Url::toRoute(['/patient/patient/find-map','lat'=>$lat,'lon'=>$lon]);
$js = <<<JS
    $('#btn_find_hdc').click(function(){
       var win = window.open('$route', 'win', 'left=100,top=80,menubar=no,location=no,resizable=yes,width=720px,height=500px');
   });
   
    $('#btn_find_map').click(function(){
       //var lat = $('#patient-lat').val();
       //var lon = $('#patient-lon').val();
       var win_map = window.open('$route_map', 'win_map', 'left=100,top=80,menubar=no,location=no,resizable=yes,width=720px,height=550px');
   });
        
   
JS;

$this->registerJs($js);
?>


