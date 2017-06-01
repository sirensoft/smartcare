<?php

namespace frontend\modules\patient\controllers;

use Yii;
use frontend\models\Amt;
use frontend\models\AmtSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\AppController;


/**
 * AmtController implements the CRUD actions for Amt model.
 */
class AmtController extends AppController {

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
     * Lists all Amt models.
     * @return mixed
     */
    public function actionIndex($pid) {
        $searchModel = new AmtSearch();
        $searchModel->patient_id = $pid;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'pid'=>$pid
        ]);
    }

    public function actionAsses($pid) {
        if (\Yii::$app->request->isPost) {
            $model = new Amt();
            $model->patient_id = \Yii::$app->request->post('patient_id');
            $model->date_serv = date('Y-m-d');
            $model->amt_text = \Yii::$app->request->post('amt_text');
            $model->specialpp_code = \Yii::$app->request->post('specialpp_code');
            if ($model->save()) {
                \Yii::$app->session->setFlash('success','บันทึกสำเร็จ');               
            }else{
                \Yii::$app->session->setFlash('danger','บันทึกไม่สำเร็จ');
            }
             return $this->redirect(['/patient/amt/index','pid'=>$model->patient_id]);
        }

        return $this->renderAjax('asses', [
            'pid'=>$pid
        ]);
    }

    /**
     * Displays a single Amt model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Amt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Amt();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Amt model.
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
     * Deletes an existing Amt model.
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
     * Finds the Amt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Amt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Amt::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
