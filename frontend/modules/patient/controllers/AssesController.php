<?php

namespace frontend\modules\patient\controllers;
use common\components\AppController;
use common\components\MyHelper;

/**
 * Description of AssesController
 *
 * @author utehn
 */
class AssesController extends AppController {
    public function actionAdl(){
        return $this->render('adl');
    }
    public function actionTai(){
        return $this->render('tai');
    }
}
