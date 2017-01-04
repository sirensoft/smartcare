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
    public function actionIndex($pid,$tai_score=0,$adl_score=0){
        return $this->render('index',[
            'pid'=>$pid
        ]);
    }

}
