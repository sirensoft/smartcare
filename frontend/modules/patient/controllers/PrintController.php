<?php

namespace frontend\modules\patient\controllers;

use common\components\AppController;
use common\components\MyHelper;


/**
 * Description of PrintController
 *
 * @author utehn
 */
class PrintController extends AppController {
    public function beforeAction($action) {
        if ($action->id == 'index') {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }
    
    public function actionIndex($pid){
        return $this->render('index',[
            'pid'=>$pid
        ]);
    }
}
