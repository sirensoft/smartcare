<?php

namespace frontend\modules\patient\controllers;

use common\components\AppController;
use common\components\MyHelper;


/**
 * Description of AssesController
 *
 * @author utehn
 */
class AssesqController extends AppController {

    public function beforeAction($action) {
        if ($action->id == 'index') {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    public function actionIndex($pid) {
        if (\Yii::$app->request->isPost) {
       
        }
        return $this->render('index', [
                    'pid' => $pid
        ]);
    }

}
