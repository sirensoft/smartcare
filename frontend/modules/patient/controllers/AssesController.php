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
    public function actionIndex($pid){
        return $this->render('index',[
            'pid'=>$pid
        ]);
    }

    public function actionAdl(){
        return $this->render('adl');
    }
    public function actionTai(){
        return $this->render('tai');
    }
}
