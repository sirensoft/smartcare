<?php

namespace frontend\controllers;

use common\components\MyHelper;
use frontend\models\test\TestPerson;
use frontend\models\files43\Service;
use frontend\models\files43\FileService;
use frontend\models\Patient;

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

    public function actionDelPerson() {

        $model = \frontend\models\test\TestPerson::find()->where(['hospcode' => '00000', 'pid' => '2'])->one();
        //$model = \frontend\models\test\TestPerson::findOne('00000');
        if ($model) {
            $model->delete();
        } else {
            echo "model don't exist.";
        }
    }

    public function actionFindPerson() {
        $arr = [1, 9];
        $model = TestPerson::find()
                ->where(['<', 'pid', 3])
                ->orWhere(['>', 'pid', 9])
                ->andWhere(['name' => NULL])
                ->asArray()
                ->orderBy(['pid' => SORT_DESC])
                ->all();
        echo json_encode($model);
        echo "<pre>";
        \yii\helpers\VarDumper::dump($model);
    }

    public function loadLastService($id) {
        $count=1;
        $hospcode = MyHelper::getUserOffice();
        $mCount = FileService::find()->where(['HOSPCODE' => $hospcode]);
        if($mCount){
            $count = $mCount->count()+1;
        }
        $pt = Patient::findOne($id);
        if ($pt) {
            $pid = $pt->pid;
        } else {
            return;
        }
        $model = new FileService();

        $service = Service::find()
                ->where(['HOSPCODE' => $hospcode])
                ->andWhere(['PID' => $pid])
                //->asArray()
                ->orderBy(['DATE_SERV' => SORT_DESC])
                ->one();
        $model->attributes = $service->attributes;
        try {
            $model->SEQ = 'S'.$count;
            $model->CHIEFCOMP = "คัดกรองผู้สูงอายุ (SmartCare)";
            $model->DATE_SERV = date("Y-m-d");
            $model->TIME_SERV = date("His");
            $model->COST =0;
            $model->PRICE=0;
            $model->PAYPRICE=0;
            $model->ACTUALPAY=0;
            $model->D_UPDATE = new \yii\db\Expression('NOW()');
            $model->save();
        } catch (\yii\db\Exception $e) {
            $model->isNewRecord = false;
            $model->save();
        }
    }

    public function actionService($id) {
        $this->loadLastService($id);
    }

}
