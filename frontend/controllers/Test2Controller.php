<?php

namespace frontend\controllers;
use frontend\models\Person;

class Test2Controller extends \yii\web\Controller
{
    public function actionIndex()
    {
        $sql = " SELECT t.rapid_code FROM plan t  WHERE  t.patient_id = '2'
                ORDER BY t.id DESC LIMIT 1 ";
        $color = \Yii::$app->db->createCommand($sql)->queryScalar();
        echo $color;
    }
    
    public function actionTestTime(){
        return date('Y-m-d H:i:s');
    }
    public function actionPerson() {
        $models = Person::find()->where(['HOSPCODE'=>'07552','CID'=>'1650501125470'])->all();
        var_dump($models);
    }

}
