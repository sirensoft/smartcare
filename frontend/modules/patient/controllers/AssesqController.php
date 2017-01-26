<?php

namespace frontend\modules\patient\controllers;

use common\components\AppController;
use common\components\MyHelper;
use frontend\models\AssessmentQ;

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

            $model = new AssessmentQ();
            $model->patient_id = $pid;
            $model->date_serv = date('Y-m-d');

            $model->q2 = \Yii::$app->request->post('q2_score');
            $model->q9 = \Yii::$app->request->post('q9_score');
            $model->q8 = \Yii::$app->request->post('q8_score');
            $model->note = \Yii::$app->request->post('note_q');

            $model->provider_id = MyHelper::getUserId();
            $model->d_update = date('Y-m-d H:i:s');
            $model->save();


            //MyHelper::execSql('CALL set_patient_class()');


            \Yii::$app->session->setFlash('success', "บันทึกแล้ว");

            //return $this->redirect(\Yii::$app->request->getReferrer());
            return $this->redirect(['index', 'pid' => $pid]);
        }
        return $this->render('index', [
                    'pid' => $pid
        ]);
    }

}
