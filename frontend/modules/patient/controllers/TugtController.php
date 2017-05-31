<?php

namespace frontend\modules\patient\controllers;

use Yii;
use frontend\models\Tugt;
use frontend\models\TugtSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TugtController implements the CRUD actions for Tugt model.
 */
class TugtController extends Controller {

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
     * Lists all Tugt models.
     * @return mixed
     */
    public function actionIndex($pid) {
        $searchModel = new TugtSearch();
        $searchModel->patient_id = $pid;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'pid' => $pid
        ]);
    }

    public function actionAsses($pid) {
        if (\Yii::$app->request->isPost) {
            $model = new Tugt();
            $model->patient_id = \Yii::$app->request->post('patient_id');
            $model->date_serv = date('Y-m-d');
            $model->walk_time = \Yii::$app->request->post('walk_time');
            
            if ($model->save()) {
                \Yii::$app->session->setFlash('success', 'บันทึกสำเร็จ');               
            }else{
                 \Yii::$app->session->setFlash('danger', 'บันทึกไม่สำเร็จ'); 
            }
             return $this->redirect(['/patient/tugt/index', 'pid' => $model->patient_id]);
        }

        return $this->render('asses', [
                    'pid' => $pid
        ]);
    }

    /**
     * Displays a single Tugt model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tugt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Tugt();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tugt model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {            
            return $this->redirect(['index', 'pid' => $model->patient_id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tugt model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $model->delete();
        return $this->redirect(['index','pid'=>$model->patient_id]);
    }

    /**
     * Finds the Tugt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tugt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Tugt::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
