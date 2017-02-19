<?php

namespace frontend\modules\aging\controllers;


use common\components\AppController;
use frontend\modules\aging\models\RptAging;
/**
 * Default controller for the `aging` module
 */
class DefaultController extends AppController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RptAging();      
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    
        ]);
    }
}
