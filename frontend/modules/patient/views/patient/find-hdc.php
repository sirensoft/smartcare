<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\widgets\ActiveForm;
use kartik\grid\GridView;
use yii\web\JsExpression;

$this->title = "ค้นหา...";
?>
<div class="panel">
    <div>
       
            ค้นหาจากฐานข้อมูล HDC
        
        <div>
<?php
$f = ActiveForm::begin([
        ]);
?>

            <input type="text" name="cid" id="cid" value="<?= $cid ?>" placeholder="เลขบัตรประชาชน 13 หลัก">


<?php ActiveForm::end(); ?>

        </div>
        <div style="margin-top: 5px">
            <?php if (!empty($dataProvider)): ?>
    <?php
    $cid_click = "
            window.opener.$('#patient-hospcode').val($(this).attr('hospcode'));
            window.opener.$('#patient-cid').val($(this).attr('cid'));
            window.opener.$('#patient-prename').val($(this).attr('prename')).change();
            window.opener.$('#patient-name').val($(this).attr('name'));
            window.opener.$('#patient-lname').val($(this).attr('lname'));
            window.opener.$('#patient-sex').val($(this).attr('sex')).change();
            window.opener.$('#patient-birth').val($(this).attr('birth'));
            window.opener.$('#patient-typearea').val($(this).attr('typearea')).change();
            window.opener.$('#patient-mstatus').val($(this).attr('mstatus'));
            window.opener.$('#patient-religion').val($(this).attr('religion'));
            window.opener.$('#patient-disease').val($(this).attr('disease'));
            window.opener.$('#patient-discharge').val($(this).attr('discharge')).change();
            window.close();
            
    ";
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'HOSPCODE',
            [
                'attribute' => 'CID',
                'format' => 'raw',
                'value' => function($data) use ($cid_click) {
                    return Html::button($data['CID'], [
                                'onclick' => new JsExpression($cid_click),
                                'cid' => $data['CID'],
                                'hospcode' => $data['HOSPCODE'],
                                'prename'=>$data['PRENAME'],
                                'name'=>$data['NAME'],
                                'lname'=>$data['LNAME'],
                                'sex'=>$data['SEX'],
                                'birth'=>$data['BIRTH'],
                                'typearea'=>$data['TYPEAREA'],
                                'mstatus'=>$data['MSTATUS'],
                                'religion'=>$data['RELIGION'],
                                'disease'=>$data['DISEASE'],
                                'discharge'=>$data['DISCHARGE']
                                
                    ]);
                }
                    ],
                    'PRENAME',
                    'NAME',
                    'LNAME',
                    'BIRTH',
                    'AGE',
                    'TYPEAREA:text:TYPE'
                ]
            ])
            ?>
                    <?php endif; ?>
                </div>
            </div>   

        </div>
                    <?php ?>
