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
            <?=Html::a('เปรียบเทียบจำนวนผู้สูงอายุแยกรายกลุ่ม',['/report/default/report4'])?>
        </li>
         <li>
            <?=Html::a('เปรียบเทียบจำนวนผู้สูงอายุแยกรายตำบล',['/report/default/report5'])?>
        </li>
         <li>
            <?=Html::a('เปรียบเทียบจำนวน Care Giver แยกรายตำบล',['/report/default/report6'])?>
        </li>
    </ol>
</div>
