<?php

namespace frontend\modules\care\controllers;

use Yii;
use frontend\models\Plan;
use frontend\models\PlanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\AppController;
use frontend\models\Patient;
use common\components\MyHelper;

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

    /**
     * Creates a new Plan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($pid) {
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
        $model->d_update = date('Y-m-d H:i:s');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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
        $model = $this->findModel($id);
        $model->d_update = date('Y-m-d H:i:s');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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

        $filePath = "./excel/plan.xls";
        $objReader = \PHPExcel_IOFactory::createReader('Excel5');
        $excel = $objReader->load($filePath);
        $model = Plan::findOne($id);
        $patient = Patient::findOne($model->patient_id);

        $excel->getActiveSheet()->setCellValue('C5', $patient->prename . $patient->name . " " . $patient->lname);
        $excel->getActiveSheet()->setCellValue('D6', $patient->cid);
        $excel->getActiveSheet()->setCellValue('C7', $patient->birth);
        $excel->getActiveSheet()->setCellValue('C15', $model->dx1);
        $excel->getActiveSheet()->setCellValue('A17', $model->dx2);
        $excel->getActiveSheet()->setCellValue('A20', $model->drug);

        $excel->getActiveSheet()->setCellValue('E6', $model->patient_mind);
        $excel->getActiveSheet()->setCellValue('I6', $model->live_problem);
        $excel->getActiveSheet()->setCellValue('E12', $model->long_goal);
        $excel->getActiveSheet()->setCellValue('E26', $model->short_goal);
        $excel->getActiveSheet()->setCellValue('I27', $model->extra_service);
        $excel->getActiveSheet()->setCellValue('E30', $model->careful);



        $objWriter = \PHPExcel_IOFactory::createWriter($excel, 'Excel5');
        $objWriter->save($filePath);


        \Yii::$app->response->sendFile($filePath, "plan.xls");
    }

}
