<?php

use common\components\MyHelper;
use yii\helpers\Html;

$this->title = MyHelper::ptInfo_($pid);

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-success">
    <div class="panel-heading">
        <h4><?= $this->title ?></h4>
    </div>
    <div class="panel-body">
        <ul>
            <li><?= Html::a('ข้อมูลบุคคล') ?></li>
            <li><?= Html::a('ประวัติการดูแล') ?></li>
            
        </ul>

    </div>

</div>

