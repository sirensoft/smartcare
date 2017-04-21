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
        $this->permitRole([2]);
        $searchModel = new RptAging();      
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    
        ]);
    }
    
    public function actionView($cid){
        $this->permitRole([2]);
        
        $searchModel = new RptAging();  
        
        $params= \Yii::$app->request->queryParams;
        
        $dataProvider = $searchModel->search(['RptAging'=>['cid'=>$cid]]);
        
        return $this->render('view', [
                    
                    'dataProvider' => $dataProvider,
                    'params'=>$params
                    
                    
        ]);
    }
}
