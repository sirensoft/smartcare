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
                'brandUrl' => Yii::$app->homeUrl,
                //'brandLabel' => 'SmartCare',
                //'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-custom navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'ข้อมูล', 'url' => ['/site']],
                ['label' => 'รายงาน', 'url' => ['/report/default/index']],
                
                    //['label' => 'Contact', 'url' => ['/site/contact']],
            ];
            if (Yii::$app->user->isGuest) {
                //$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-info logout']
                        )
                        . Html::endForm()
                        . '</li>';
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
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
                <?php echo Alert::widget(); ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">Version <?=  MyHelper::getVersion();?> </p>

                <p class="pull-right">&copy; สสจ.พล</p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
