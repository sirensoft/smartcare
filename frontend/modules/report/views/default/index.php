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
    </ol>
</div>
