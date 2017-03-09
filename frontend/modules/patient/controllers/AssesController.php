<?php

namespace frontend\modules\patient\controllers;

use common\components\AppController;
use common\components\MyHelper;
use frontend\models\Assessment;
use yii\filters\VerbFilter;

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
    
       public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex($pid) {
        if (\Yii::$app->request->isPost) {
            $model = new Assessment();
            $model->patient_id = $pid;
            $model->date_serv = date('Y-m-d');
            $model->adl_score = \Yii::$app->request->post('adl_score');
            
            $pp_code = '1B128';
            if($model->adl_score >=0 and $model->adl_score <=4){
                $pp_code = '1B1282';
            }
            if($model->adl_score >=5 and $model->adl_score <=11){
                $pp_code = '1B1281';
            }
            if($model->adl_score >=12){
                $pp_code = '1B1280';
            }
            $model->pp_code = $pp_code;
            
            //$model->tai_score = \Yii::$app->request->post('tai_score');
            $model->tai_class = \Yii::$app->request->post('tai_class');
            $model->note = \Yii::$app->request->post('note');
            
            $model->provider_id = MyHelper::getUserId();
            $model->d_update = date('Y-m-d H:i:s');
            $model->save();

            MyHelper::setPatientADL($pid);
            MyHelper::setPatientTAI($pid);            
            MyHelper::execSql('CALL set_patient_class()');
            
             //adl_month
            $sql = "CALL add_adl_month($pid)";
            MyHelper::execSql($sql);


            \Yii::$app->session->setFlash('success', "บันทึกแล้ว");

            //return $this->redirect(\Yii::$app->request->getReferrer());
            return $this->redirect(['index', 'pid' => $pid]);
        }
        return $this->render('index', [
                    'pid' => $pid
        ]);
    }
    public function actionUpdate($id){
        $model = Assessment::findOne($id);
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->session->setFlash('success', "บันทึกสำเร็จ!!!");
               //adl_month
            $sql = "CALL add_adl_month($model->patient_id)";
            MyHelper::execSql($sql);
            return $this->redirect(['index', 'pid' => $model->patient_id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

}
