<?php

namespace frontend\modules\care\controllers;

use Yii;
use frontend\models\Visit;
use frontend\models\VisitSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\MyHelper;
use frontend\models\PlanWeek;
use frontend\models\Patient;

/**
 * VisitController implements the CRUD actions for Visit model.
 */
class VisitController extends Controller {

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
        $model->provider_id = MyHelper::getUserId();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $mPlanWeek = PlanWeek::findOne($model->plan_week_id);
            $mPlanWeek->is_done = '1';
            $mPlanWeek->update();

           
            $patient = Patient::findOne($model->patient_id);
            MyHelper::sendLineNotify($patient->prename . $patient->name . " " . $patient->lname . "..ได้รับการเยี่ยมโดย..".MyHelper::getUserFullName());

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
        $model = $this->findModel($id);

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
        $model = $this->findModel($id);
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

}
