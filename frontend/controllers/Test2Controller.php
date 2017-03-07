<?php

namespace frontend\controllers;

class Test2Controller extends \yii\web\Controller {

    public function actionIndex() {
        $sql = " SELECT t.rapid_code FROM plan t  WHERE  t.patient_id = '2'
                ORDER BY t.id DESC LIMIT 1 ";
        $color = \Yii::$app->db->createCommand($sql)->queryScalar();
        echo $color;
    }

    public function actionTestTime() {
        return date('Y-m-d H:i:s');
    }
    public function actionDelPerson(){
        
       $model = \frontend\models\test\TestPerson::find()->where(['hospcode'=>'00000','pid'=>'2'])->one();
       //$model = \frontend\models\test\TestPerson::findOne('00000');
       if($model){
        $model->delete();
       }else{
           echo "model don't exist.";
       }
        
    }

   

}
