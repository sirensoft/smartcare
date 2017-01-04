<?php

namespace frontend\modules\patient\controllers;

use common\components\AppController;
use common\components\MyHelper;
use frontend\models\Assessment;

/**
 * Description of AssesController
 *
 * @author utehn
 */
class AssesController extends AppController {

    public function beforeAction($action) {
        if ($action->id == 'index') {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    public function actionIndex($pid) {
        if (\Yii::$app->request->isPost) {
            $model = new Assessment();
            $model->patient_id = $pid;
            $model->date_serv = date('Y-m-d');
            $model->adl_score = \Yii::$app->request->post('adl_score');
            $model->tai_score = \Yii::$app->request->post('tai_score');
            $model->provider_id = \Yii::$app->request->post('provider_id');
            $model->d_update = date('Y-m-d H:i:s');
            $model->save();
            \Yii::$app->session->setFlash('success', "บันทึกแล้ว");
        }
        return $this->render('index', [
                    'pid' => $pid
        ]);
    }

}
