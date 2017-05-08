<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\components\MyHelper;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
      
        
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body >
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => '<span class="glyphicon glyphicon-phone"></span>',
                //'brandLabel'=>  Html::img('./web_img/ltc-icon.jpg', ['width'=>'35','height'=>'35','style'=>'margin-buttom:5px']),
                'brandUrl' => Yii::$app->homeUrl,
                //'brandLabel' => 'SmartCare',
                //'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-custom navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'กลุ่มพึ่งพิง', 'url' => ['/patient/patient/index']],
                ['label' => 'กลุ่มทั้งหมด', 'url' => ['/aging/default/index'],'visible'=>  !MyHelper::isCg()],
                ['label' => 'รายงาน', 'url' => ['/report/default/index']],
                ['label' => 'ชมรม', 'url' => ['/club/club/index'],'visible'=>  MyHelper::isCm()],
                    //['label' => 'Contact', 'url' => ['/site/contact']],
            ];
            if (Yii::$app->user->isGuest) {
                //$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                 $menuItems[] = [
                    'label' => '<span class="glyphicon glyphicon-user"></span> ' . \Yii::$app->user->identity->username,
                    'items' => [
                        ['label' => '<i class="glyphicon glyphicon-info-sign"></i> ข้อมูลส่วนตัว', 'url' => ['/profile/default/view','id'=>  \Yii::$app->user->id]],
                        '<li class="divider"></li>',                        
                        ['label' => '<span class="glyphicon glyphicon-off"></span> Logout','url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
                    ],
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
                'encodeLabels' => false,
            ]);

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'encodeLabels' => false,
                'items' => [['label' => 'SmartCare']],
            ]);

            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?php //echo Alert::widget(); ?>
                <?php echo \yii2mod\notify\BootstrapNotify::widget(); ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">Version <?=  MyHelper::getVersion();?> Server Time: <span id="s_time"><?=date('Y-m-d H:i:s')?></span> </p>

                <p class="pull-right">&copy; สสจ.พล</p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
