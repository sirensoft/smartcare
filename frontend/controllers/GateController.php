<?php

namespace frontend\controllers;

class GateController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $sql = " SELECT t.rapid_code FROM plan t  WHERE  t.patient_id = '2'
                ORDER BY t.id DESC LIMIT 1 ";
        $color = \Yii::$app->db->createCommand($sql)->queryScalar();
        echo $color;
    }
    
    public function actionGo($url=null){
        return $this->redirect($url);
    }

}
