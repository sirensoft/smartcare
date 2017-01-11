<?php

namespace frontend\modules\care\controllers;

use Yii;
use common\components\AppController;
use frontend\models\PlanWeek;
use frontend\models\PlanWeekSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use frontend\models\Patient;
use common\components\MyHelper;

/**
 * PlanController implements the CRUD actions for Plan model.
 */
class PlanWeekController extends AppController {

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
        $this->permitRole([1, 2, 3]);



        $vw = 'index';

        $tasks = [];
        $raw = PlanWeek::find()->where(['patient_id' => $pid])->all();

        foreach ($raw as $plan) {
            $evt = new \yii2fullcalendar\models\Event();
            $evt->id = $plan->id;
            $evt->title = $plan->title;

            $evt->start = $plan->start_date . " " . $plan->start_time;
            $evt->url = Url::toRoute(['/care/plan-week/update', 'id' => $evt->id]);

            if ($plan->start_date > date('Y-m-d') and $plan->is_done !== '1') {
                $evt->color = 'blue';
            } elseif ($plan->is_done === '1') {
                $evt->color = 'lime';
                $evt->textColor = 'black';
            } else {

                $evt->color = 'red';
            }




            $tasks[] = $evt;
        }

        if (\Yii::$app->request->isAjax) {
            return $this->renderAjax($vw, [
                        'pid' => $pid,
                        'events' => $tasks,
                        'model' => Patient::findOne($pid)
            ]);
        }
        return $this->render($vw, [
                    'pid' => $pid,
                    'events' => $tasks,
                    'model' => Patient::findOne($pid)
        ]);
    }

    /**
     * Displays a single Plan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Plan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($pid, $start) {
        $model = new PlanWeek();
        $model->patient_id = $pid;
        $model->start_date = $start;
        $model->start_time = '08:00';
        $model->d_create = date('Y-m-d H:i:s');



        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $chk_day = \Yii::$app->request->post('chk_day');
            if (!empty($chk_day)) {

                $i = 1;
                while ($i <= 6) {
                    $date_next = new \DateTime($model->start_date);
                    $date_next = $date_next->modify("+$i day");
                    $date_next = $date_next->format('Y-m-d');

                    $model_n = new PlanWeek();
                    $model_n->patient_id = $pid;
                    $model_n->start_date = $date_next;
                    $model_n->start_time = $model->start_time;
                    $model_n->end_time = $model->end_time;
                    $model_n->d_create = $model->d_create;
                    $model_n->title = $model->title;
                    $model_n->provider_id = $model->provider_id;
                    $model_n->save();
                    $i++;
                }
            }

            return $this->redirect(['index', 'pid' => $model->patient_id]);
        } else {
            return $this->renderAjax('create', [
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
        if (MyHelper::isCg()) {
            if (empty($model->care_date)) {
                $model->care_date = date('Y-m-d');
            }
            if (empty($model->care_time)) {
                $model->care_time = date('H:i:s');
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (MyHelper::isCg() && $model->start_date <= date('Y-m-d')) {
                $model->is_done = '1';
                $model->update();
                $pid = $model->patient_id;
                $patient = Patient::findOne($pid);
                MyHelper::sendLineNotify($patient->prename . $patient->name . " " . $patient->lname . "..ได้รับการ.." . $model->title);
            }
            return $this->redirect(['index', 'pid' => $model->patient_id]);
        } else {
            return $this->renderAjax('update', [
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
    public function actionDelete($id, $pid) {
        $this->findModel($id)->delete();

        return $this->redirect(['index', 'pid' => $pid]);
    }

    protected function findModel($id) {
        if (($model = PlanWeek::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionExcel($pid, $start) {
        if (MyHelper::getDay($start) !== 'Mon') {
            return;
        }

        $filePath = "./excel/plan_week.xls";
        $objReader = \PHPExcel_IOFactory::createReader('Excel5');
        $excel = $objReader->load($filePath);



        for ($i = 6; $i < 24; $i++) {
            $excel->getActiveSheet()->setCellValue("C" . $i, MyHelper::getPlan($pid, $start, $i));
        }
        for ($i = 6; $i < 24; $i++) {
            $excel->getActiveSheet()->setCellValue("D" . $i, MyHelper::getPlan($pid, MyHelper::datePlus($start, 1), $i));
        }
        for ($i = 6; $i < 24; $i++) {
            $excel->getActiveSheet()->setCellValue("E" . $i, MyHelper::getPlan($pid, MyHelper::datePlus($start, 2), $i));
        }
        for ($i = 6; $i < 24; $i++) {
            $excel->getActiveSheet()->setCellValue("F" . $i, MyHelper::getPlan($pid, MyHelper::datePlus($start, 3), $i));
        }
        for ($i = 6; $i < 24; $i++) {
            $excel->getActiveSheet()->setCellValue("G" . $i, MyHelper::getPlan($pid, MyHelper::datePlus($start, 4), $i));
        }
        for ($i = 6; $i < 24; $i++) {
            $excel->getActiveSheet()->setCellValue("H" . $i, MyHelper::getPlan($pid, MyHelper::datePlus($start, 5), $i));
        }
        for ($i = 6; $i < 24; $i++) {
            $excel->getActiveSheet()->setCellValue("I" . $i, MyHelper::getPlan($pid, MyHelper::datePlus($start, 6), $i));
        }







        $objWriter = \PHPExcel_IOFactory::createWriter($excel, 'Excel5');
        $objWriter->save($filePath);
        \Yii::$app->response->sendFile($filePath, "plan_week.xls");
    }

}
