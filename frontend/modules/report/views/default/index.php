<?php
use yii\helpers\Html;

$this->params['breadcrumbs'][] = 'รายงาน';
?>
<div class="report-default-index">
    <ol>
        <li>
            <?=  Html::a('รายงานผลการดูแลตามแผน',['/report/default/report1'])?>
        </li>
        <li>
            <?=  Html::a('รายงานผลการดูแลรายคน',['/report/default/report2'])?>
        </li>
        <li>
            <?=  Html::a('ความเคลื่อนไหว ADL',['/report/default/report3'])?>
        </li>
        <li>
            <?=Html::a('เปรียบเทียบจำนวนผู้สูงอายุแยกรายกลุ่ม',['/report/default/pie1'])?>
        </li>
         <li>
            <?=Html::a('เปรียบเทียบจำนวนผู้สูงอายุแยกรายตำบล',['/report/default/pie2'])?>
        </li>
         <li>
            <?=Html::a('เปรียบเทียบจำนวนบุคคลากรประเภทต่างๆที่ดำเนิงานผู้สูงอายุ',['/report/default/pie3'])?>
        </li>
    </ol>
</div>
