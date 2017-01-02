<?php

namespace frontend\modules\care\controllers;

use Yii;
use frontend\models\Plan;
use frontend\models\PlanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;

/**
 * PlanController implements the CRUD actions for Plan model.
 */
class PlanController extends Controller {

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
        //$vw = 'index_cg';
        $vw = 'index_cm';

        $tasks = [];
        $raw = Plan::find()->where(['patient_id'=>$pid])->all();

        foreach ($raw as $plan) {
            $evt = new \yii2fullcalendar\models\Event();
            $evt->id = $plan->id;
            $evt->title = $plan->title;

            $evt->start = $plan->start_date . " " . $plan->start_time;
            $evt->url = Url::toRoute(['/care/plan/update', 'id' => $evt->id]);
            
            
            if ($plan->start_date == date("Y-m-d")) {
                $evt->color = 'red';
            }
            if ($plan->start_date > date("Y-m-d")) {
                $evt->color = 'orange';
            }
            if ($plan->start_date < date("Y-m-d")) {
                $evt->color = 'green';
            }

            $tasks[] = $evt;
        }


        return $this->render($vw, [
                    'pid' => $pid,
                    'events' => $tasks
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
    public function actionCreate($pid,$start) {
        $model = new Plan();
        $model->patient_id = $pid;
        $model->start_date = $start;
        $model->start_time = date('H:i');
        $model->d_create = date('Y-m-d H:i:s');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'pid' => $model->patient_id ]);
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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
    public function actionDelete($id,$pid) {
        $this->findModel($id)->delete();

        return $this->redirect(['index','pid'=>$pid]);
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

}
