<?php

namespace frontend\modules\aging\controllers;

use Yii;
use frontend\models\ClubMember;
use frontend\models\ClubMemberSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\MyHelper;

/**
 * ClubmemberController implements the CRUD actions for ClubMember model.
 */
class ClubmemberController extends Controller
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
     * Lists all ClubMember models.
     * @return mixed
     */
    public function actionIndex($cid,$person_name)
    {
        $searchModel = new ClubMemberSearch();
        $searchModel->cid = $cid;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'cid'=>$cid,
            'person_name'=>$person_name
        ]);
    }

    /**
     * Displays a single ClubMember model.
     * @param string $cid
     * @param integer $club_id
     * @return mixed
     */
    public function actionView($cid, $club_id,$person_name)
    {
        return $this->render('view', [
            'model' => $this->findModel($cid, $club_id),
            'cid'=>$cid,
            'person_name'=>$person_name
        ]);
    }

    /**
     * Creates a new ClubMember model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($cid,$person_name)
    {
        $model = new ClubMember();
        $model->cid = $cid;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'cid' => $model->cid, 'club_id' => $model->club_id,'person_name'=>$person_name]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'cid'=>$cid,
                'person_name'=>$person_name
            ]);
        }
    }

    /**
     * Updates an existing ClubMember model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $cid
     * @param integer $club_id
     * @return mixed
     */
    public function actionUpdate($cid, $club_id,$person_name)
    {
        $model = $this->findModel($cid, $club_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'cid' => $model->cid, 'club_id' => $model->club_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'cid'=>$cid,
                'person_name'=>$person_name
            ]);
        }
    }

    /**
     * Deletes an existing ClubMember model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $cid
     * @param integer $club_id
     * @return mixed
     */
    public function actionDelete($cid, $club_id)
    {
        $this->findModel($cid, $club_id)->delete();

        return $this->redirect(['index',[
            'cid'=>$cid
        ]]);
    }

    /**
     * Finds the ClubMember model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $cid
     * @param integer $club_id
     * @return ClubMember the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($cid, $club_id)
    {
        if (($model = ClubMember::findOne(['cid' => $cid, 'club_id' => $club_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
