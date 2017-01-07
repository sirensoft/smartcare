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
            return $this->redirect(['index', 'pid' => $model->patient_id]);
        } else {
            return $this->renderPartial('create', [
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
            return $this->renderPartial('update', [
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

    /**
     * Finds the Plan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Plan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = PlanWeek::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
