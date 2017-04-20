<?php

namespace frontend\modules\care\controllers;

use Yii;
use frontend\models\Plan;
use frontend\models\PlanSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\AppController;
use frontend\models\Patient;
use common\components\MyHelper;
use frontend\models\CChronic;

/**
 * PlanController implements the CRUD actions for Plan model.
 */
class PlanController extends AppController {

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
     * Lists all Plan models.
     * @return mixed
     */
    public function actionIndex($pid) {
        $searchModel = new PlanSearch();
        $searchModel->patient_id = $pid;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'pid' => $pid
        ]);
    }

    /**
     * Displays a single Plan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('plan_view', [
                    'model' => $this->findModel($id),
        ]);
    }
     public function actionVieww($id) {
        return $this->render('plan_vieww', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Plan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($pid) {
         $this->permitRole([2]);
        $pt = Patient::findOne($pid);


        $model = new Plan();
        $model->patient_id = $pid;
        $model->adl = $pt->adl;
        $adl_text = "ติดเตียง";
        if ($pt->adl > 4) {
            $adl_text = "ติดบ้าน";
        }
        if ($pt->adl > 11) {
            $adl_text = "ติดสังคม";
        }
        $model->adl_text = $adl_text;
        $model->tai = $pt->tai;
        $model->tai_text = "กลุ่มที่ " . $pt->class_id . ";" . $pt->class_name;
        $model->hospcode = MyHelper::getUserOffice();

        $disease = explode(",", $pt->disease);
        if (!empty($disease[0])) {
            $dx1 = CChronic::find()->where(['id_chronic' => $disease[0]])->one();
        }
        if (!empty($disease[1])) {
            $dx2 = CChronic::find()->where(['id_chronic' => $disease[1]])->one();
        }
        $model->dx1 = empty($disease[0]) ? '' : $disease[0] . "-" . $dx1->tchronic;
        $model->dx2 = empty($disease[1]) ? '' : $disease[1] . "-" . $dx2->tchronic;

        $model->d_update = date('Y-m-d H:i:s');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            MyHelper::ptRapidColor($model->patient_id);

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Plan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
         $this->permitRole([2]);
        $model = $this->findModel($id);
        $model->d_update = date('Y-m-d H:i:s');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            MyHelper::ptRapidColor($model->patient_id);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Plan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $pid = $model->patient_id;
        $model->delete();
        MyHelper::ptRapidColor($model->patient_id);

        return $this->redirect(['index', 'pid' => $pid]);
    }

    /**
     * Finds the Plan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Plan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Plan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionExcel($id) {
        $fmt=\Yii::$app->formatter;

        $filePath = "./excel/plan.xls";
        $objReader = \PHPExcel_IOFactory::createReader('Excel5');
        $excel = $objReader->load($filePath);
        $model = Plan::findOne($id);
        $patient = Patient::findOne($model->patient_id);

        $excel->getActiveSheet()->setCellValue('C1', $patient->prename . $patient->name . " " . $patient->lname);
        $excel->getActiveSheet()->setCellValue('E1', "อายุ " . $patient->age_y . " ปี");
        $excel->getActiveSheet()->setCellValue('F1', "หน่วยบริการ: ".MyHelper::getUserOfficeName());
        $excel->getActiveSheet()->setCellValue('J1', "วันที่จัดทำ : ".$fmt->asDate($model->d_update));
        
        $excel->getActiveSheet()->setCellValue('C5', $patient->prename . $patient->name . " " . $patient->lname);
        $excel->getActiveSheet()->setCellValue('D6', $patient->cid);
        $excel->getActiveSheet()->setCellValue('C7', $fmt->asDate($patient->birth));
        $excel->getActiveSheet()->setCellValue('D7', "อายุ " . $patient->age_y . " ปี");
        $addr = "ที่อยู่ปัจจุบัน \r" . $patient->house_no . " ม." . $patient->village_no
                . " ต." . $patient->subdistrict . " อ." . $patient->district . " โทร." . $patient->tel;
        

        $excel->getActiveSheet()->setCellValue('D10', $model->rapid_code);

        $excel->getActiveSheet()->setCellValue('C11', $model->adl);
        $excel->getActiveSheet()->setCellValue('C12', $model->tai);
        $excel->getActiveSheet()->setCellValue('D11', $model->adl_text);
        $excel->getActiveSheet()->setCellValue('D12', $model->tai_text);

        $excel->getActiveSheet()->setCellValue('A8', $addr);
        $excel->getActiveSheet()->getStyle('A8')->getAlignment()->setWrapText(true);
        
        $excel->getActiveSheet()->setCellValue('A14', $model->budget_need);
        $excel->getActiveSheet()->setCellValue('C14', "=BAHTTEXT(A14)");

        $excel->getActiveSheet()->setCellValue('C15', $model->dx1);
        $excel->getActiveSheet()->setCellValue('A17', $model->dx2);
        $excel->getActiveSheet()->setCellValue('A20', $model->drug);
        $excel->getActiveSheet()->getStyle('A20')->getAlignment()->setWrapText(true);

        $excel->getActiveSheet()->setCellValue('E6', $model->patient_mind);
        $excel->getActiveSheet()->getStyle('E6')->getAlignment()->setWrapText(true);
        
        $excel->getActiveSheet()->setCellValue('I6', $model->live_problem);
        $excel->getActiveSheet()->getStyle('I6')->getAlignment()->setWrapText(true);
        
        $excel->getActiveSheet()->setCellValue('E12', $model->long_goal);
        $excel->getActiveSheet()->getStyle('E12')->getAlignment()->setWrapText(true);
        
        $excel->getActiveSheet()->setCellValue('E26', $model->short_goal);
        $excel->getActiveSheet()->getStyle('E26')->getAlignment()->setWrapText(true);
        
        $excel->getActiveSheet()->setCellValue('I27', $model->extra_service);
        $excel->getActiveSheet()->getStyle('I27')->getAlignment()->setWrapText(true);
        
        $excel->getActiveSheet()->setCellValue('E30', $model->careful);
        
        $excel->getActiveSheet()->setCellValue('D26', $model->fct_care_time);
        $excel->getActiveSheet()->setCellValue('D27', $model->cg_care_time);



        $objWriter = \PHPExcel_IOFactory::createWriter($excel, 'Excel5');
        $objWriter->save($filePath);


        \Yii::$app->response->sendFile($filePath, "plan_$id.xls");
    }

}
