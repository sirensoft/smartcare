<?php

namespace frontend\modules\patient\controllers;

use Yii;
use frontend\models\Patient;
use frontend\models\PatientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\AppController;
use common\components\MyHelper;

/**
 * PatientController implements the CRUD actions for Patient model.
 */
class PatientController extends AppController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
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
     * Lists all Patient models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->permitRole([1,2,3]);
        
        $searchModel = new PatientSearch();
        if(MyHelper::getUserOffice()<>'all'){
            $searchModel->hospcode = MyHelper::getUserOffice();
        }
        
        if(MyHelper::isCg()){
            $searchModel->cg_id = MyHelper::getUserId();
        }
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
      public function actionModal(){
        return $this->render('');
    }

    /**
     * Displays a single Patient model.
     * @param string $id
     * @return mixed
     */
    public function actionView($pid)
    {
        $this->permitRole([1,2,3]);
        return $this->render('view', [
            'model' => $this->findModel($pid),
        ]);
    }

    /**
     * Creates a new Patient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->permitRole([2]);
        $model = new Patient();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'pid' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Patient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($pid)
    {
        $this->permitRole([2]);
        $model = $this->findModel($pid);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'pid' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Patient model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($pid)
    {
        $this->permitRole([2]);
        $this->findModel($pid)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Patient model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Patient the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($pid)
    {
        if (($model = Patient::findOne($pid)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionNote(){
        return $this->renderAjax('note');
    }
}
