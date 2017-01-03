<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\ButtonGroup;
use common\components\MyHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Patient */

$this->title = $model->name . " " . $model->lname;
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนผู้ป่วย', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-view">



    <p>
        
        <?php if(!MyHelper::isCg()):?>
        <?= Html::a('EDIT', ['update', 'pid' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('+ HDC', ['update', 'pid' => $model->id], ['class' => 'btn btn-info']) ?>
        <?= Html::a('+ เจ็บป่วย', ['update', 'pid' => $model->id], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('+ ประเมิน', ['update', 'pid' => $model->id], ['class' => 'btn btn-success']) ?>
        <?php endif; ?>
        <?= Html::a('CP', ['/care/plan/index', 'pid' => $model->id], ['class' => 'btn btn-warning ']) ?>




    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cid',
            'prename',
            'name',
            'lname',
            'sex',
            'birth',
            'province',
            'district',
            'subdistrict',
            'village_no',
            'village_name',
            'house_no',
            'typearea',
            'nation',
            'region',
            'discharge',
            'dupdate',
        ],
    ])
    ?>
    <p>
        <?php if(MyHelper::isCm()):  ?>
        <?=
        Html::a('DEL', ['delete', 'pid' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
        <?php endif; ?>
    </p>

</div>
