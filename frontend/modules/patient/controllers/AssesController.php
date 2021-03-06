<?php

namespace frontend\modules\patient\controllers;

use common\components\AppController;
use common\components\MyHelper;
use frontend\models\Assessment;
use yii\filters\VerbFilter;
use frontend\models\Person;
use frontend\models\FileSpecialpp;
use frontend\models\Patient;

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
            if ($model->adl_score >= 0 and $model->adl_score <= 4) {
                $pp_code = '1B1282';
            }
            if ($model->adl_score >= 5 and $model->adl_score <= 11) {
                $pp_code = '1B1281';
            }
            if ($model->adl_score >= 12) {
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

            // special_pp ***
            if (MyHelper::isCm()) {
                $sp = new FileSpecialpp();
                $pt = Patient::find()->where(['id' => $pid])->one();
                $sp->HOSPCODE = $pt->hospcode;
                try {
                    $pn = Person::find()->where(['HOSPCODE' => $pt->hospcode, 'CID' => $pt->cid])->one();
                    $sp->PID = $pn->PID;
                } catch (\yii\db\Exception $e) {
                    $sp->PID = $pt->cid;
                }
                $sp->SEQ = 's' . date('YmdHis');
                $sp->DATE_SERV = $model->date_serv;
                $sp->SERVPLACE = '2';
                $sp->PPSPECIAL = $model->pp_code;
                $sp->PPSPLACE = $pt->hospcode;
                $sp->PROVIDER = 'smartcare';
                $sp->D_UPDATE = date('YmdHis');

                try {
                    $sp->save(FALSE);
                } catch (\yii\db\Exception $e) {
                    $sp->isNewRecord = false;
                    $sp->save(FALSE);
                }
            }
            // special_pp ***

            \Yii::$app->session->setFlash('success', "บันทึกแล้ว");

            //return $this->redirect(\Yii::$app->request->getReferrer());
            return $this->redirect(['index', 'pid' => $pid]);
        }
        return $this->render('index', [
                    'pid' => $pid
        ]);
    }

    public function actionUpdate($id) {
        $model = Assessment::findOne($id);
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->session->setFlash('success', "บันทึกสำเร็จ!!!");

            MyHelper::setPatientADL($model->patient_id);
            //MyHelper::setPatientTAI($pid);            
            //MyHelper::execSql('CALL set_patient_class()');
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

    public function actionDelete($id) {
        $this->permitRole([2]);
        $model = Assessment::findOne($id);
        $pid = $model->patient_id;
        if ($model) {
            if ($model->delete()) {
                \Yii::$app->session->setFlash('danger', "ลบสำเร็จ!!!");
            }
        }
        return $this->redirect(['/patient/asses/index', 'pid' => $pid]);
    }

}
