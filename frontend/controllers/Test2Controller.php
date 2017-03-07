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
        $hospcode = MyHelper::getUserOffice();
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
            $model->save();
        } catch (\yii\db\Exception $e) {
            $model->isNewRecord = false;
            $model->save();
        }
    }

    public function actionService($id) {
        $this->loadLastService($id);

        $hospcode = MyHelper::getUserOffice();
        $pt = Patient::findOne($id);

        $pid = $pt->pid;

        $new_service = FileService::find()
                ->where(['HOSPCODE' => $hospcode])
                ->andWhere(['PID' => $pid])
                //->asArray()
                ->orderBy(['DATE_SERV' => SORT_DESC])
                ->one();
        $count= FileService::find()
                ->where(['HOSPCODE' => $hospcode])
                ->count();
        //$new_service = FileService::findOne(4);
        $new_service->SEQ = 'S' . $count;
        $new_service->CHIEFCOMP = "คัดกรองผู้สูงอายุ (SmartCare)";
        $new_service->DATE_SERV = date("Y-m-d");
        $new_service->TIME_SERV = date("His");
        $new_service->update();
    }

}
