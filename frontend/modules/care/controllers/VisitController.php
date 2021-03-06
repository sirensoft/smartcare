<?php

namespace frontend\modules\care\controllers;

use Yii;
use frontend\models\Visit;
use frontend\models\VisitSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\MyHelper;
use frontend\models\PlanWeek;
use frontend\models\Patient;
use common\components\AppController;
use backend\models\User;

/**
 * VisitController implements the CRUD actions for Visit model.
 */
class VisitController extends AppController {

    /**
     * @inheritdoc
     */
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

    /**
     * Lists all Visit models.
     * @return mixed
     */
    public function actionIndex($pid) {
        $searchModel = new VisitSearch();
        $searchModel->patient_id = $pid;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'pid' => $pid
        ]);
    }

    /**
     * Displays a single Visit model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Visit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {

        $model = new Visit();
        $req = \Yii::$app->request;
        $model->patient_id = $req->get('pid');
        $model->plan_week_id = $req->get('planweek_id');
        $model->date_visit = $req->get('start_date');
        if (empty($model->date_visit)) {
            $model->date_visit = date('Y-m-d');
        }
        $model->start_time = $req->get('start_time');
        $model->end_time = $req->get('end_time');
        if (MyHelper::isCg()) {
            $model->provider_id = MyHelper::getUserId();
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $mPlanWeek = PlanWeek::findOne($model->plan_week_id);
            if ($mPlanWeek) {
                $mPlanWeek->is_done = '1';
                $mPlanWeek->update();
            }


            $patient = Patient::findOne($model->patient_id);
            $msg = "\r\n";
            $msg.= $patient->prename . $patient->name . " " . $patient->lname . "(" . $patient->age_y . "ปี)";
            $msg.="\r\n";
            $msg.="กลุ่ม (" . $patient->class_name . ")";
            $msg.="\r\n";
            $msg.=$model->subjective;
            $msg.="\r\n";
            $msg.="รอบเอว." . $model->obj_waist . "ซม. ,";
            $msg.="นน." . $model->obj_weight . "กก. ,";
            $msg.="สูง" . $model->obj_heigh . "ซม. ,";
            $msg.="bmi=" . $model->obj_bmi;
            $msg.="\r\n";
            $msg.="อุณภูมิ:" . $model->obj_temperature;
            $msg.=" ,ชีพจร:" . $model->obj_pulse;
            $msg.="\r\n";
            $msg.="ความดัน:" . $model->obj_bp;
            $msg.=" ,หายใจ:" . $model->obj_rr;
            $msg.="\r\n";
            $msg.="น้ำตาล:" . $model->obj_sugar;
            $msg.=" ,ADL=" . $model->obj_adl;
            $msg.="\r\n";
            $msg.="ผลการเยี่ยม: " . $model->job_result;
            $msg.="\r\n";
            $msg.="ปัญหาที่พบ: " . $model->problem;
            $msg.="\r\n";
            $msg.="ผู้เยี่ยม:" . MyHelper::getUserFullName();

            MyHelper::sendLineNotify('care', $msg);

            //adl_month
            $sql = "CALL add_adl_month($patient->id)";
            MyHelper::execSql($sql);

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Visit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $this->permitRole([2, 3]);
        $model = $this->findModel($id);

        if (MyHelper::isCg() and $model->provider_id !== MyHelper::getUserId()) {
            throw new \yii\web\ConflictHttpException('ไม่อนุญาต');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {   
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Visit model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->permitRole([2, 3]);
        $model = $this->findModel($id);

        if (MyHelper::isCg() and $model->provider_id !== MyHelper::getUserId()) {
            throw new \yii\web\ConflictHttpException('ไม่อนุญาต');
        }

        $pid = $model->patient_id;
        $model->delete();

        return $this->redirect(['index', 'pid' => $pid]);
    }

    /**
     * Finds the Visit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Visit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Visit::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function addCell($excel, $cell, $val) {
        $excel->getActiveSheet()->setCellValue($cell, $val);
    }

    public function actionExcel($id) {
        $fmt = \Yii::$app->formatter;
        $filePath = "./excel/cg_log.xls";

        $model = Visit::findOne($id);
        $objReader = \PHPExcel_IOFactory::createReader('Excel5');
        $excel = $objReader->load($filePath);

        // เขียน CELL
        $this->addCell($excel, 'A1',"บันทึกการเยี่ยม : ".MyHelper::ptInfo_($model->patient_id));
        $this->addCell($excel, 'K1', "เลขที่:".$id);

        $this->addCell($excel, 'B2', $fmt->asDate($model->date_visit));
        $this->addCell($excel, 'E2', $model->start_time);
        $this->addCell($excel, 'G2', $model->end_time);

        $this->addCell($excel, 'A4', "'" . $model->subjective);
        $excel->getActiveSheet()->getStyle('A4')->getAlignment()->setWrapText(true);
        $excel->getActiveSheet()->getStyle('A10')->getAlignment()->setWrapText(true);
        
        $this->addCell($excel, 'C6', $model->obj_weight);
        $this->addCell($excel, 'F6', $model->obj_heigh);
        $this->addCell($excel, 'J6', $model->obj_bmi);
        $this->addCell($excel, 'C7', $model->obj_temperature);
        $this->addCell($excel, 'H7', $model->obj_pulse);
        $this->addCell($excel, 'C8', $model->obj_rr);
        $this->addCell($excel, 'I8', $model->obj_bp);
        $this->addCell($excel, 'G11', $model->obj_adl);
        $this->addCell($excel, 'D63', $model->job_result);
        $this->addCell($excel, 'D64', $model->next_plan);
        
        $pt_id = $model->patient_id;
        $pt = Patient::findOne($pt_id);
        
        $this->addCell($excel, 'B67', "       (".$pt->prename.$pt->name." ".$pt->lname.")");
        
        $cg = $pt->cg_id;
        $user = User::findOne($cg);
        $cg_name = $user->u_prename . $user->u_name . " " . $user->u_lname;

        $this->addCell($excel, 'B69', "       ($cg_name)");

        // จบเขียน CELL
        
        $objWriter = \PHPExcel_IOFactory::createWriter($excel, 'Excel5');
        //$objWriter = \PHPExcel_IOFactory::createWriter($excel, 'HTML');
        $objWriter->save($filePath);
        //$objWriter->save('php://output');
        \Yii::$app->response->sendFile($filePath, "cg_log_$id.xls");
    }

}
