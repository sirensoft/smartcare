<?php

namespace frontend\controllers;

use common\components\AppController;
use frontend\models\files43\Person;
use frontend\models\files43\FilePerson;
use common\components\MyHelper;
use frontend\models\Patient;

class UtilityController extends AppController {

    public function actionTime() {
        return date('Y-m-d H:i:s');
    }

    public function actionPerson() {

        $hospcode = MyHelper::getUserOffice();
        $oModel = Person::findAll(['HOSPCODE' => $hospcode]);

        foreach ($oModel as $obj) {
            $clone = new FilePerson();
            $clone->attributes = $obj->attributes;

            try {
                $clone->save();
            } catch (\yii\db\Exception $e) {
                $clone->isNewRecord = false;
                $clone->save();
            }
        }
    }

    public function actionAddAdlMon() {

        $sql ="CALL set_adl_month";
        \Yii::$app->db->createCommand($sql)->execute();
        
        $hospcode = MyHelper::getUserOffice();
        //$oModel = Patient::findAll(['hospcode' => $hospcode]);
        $oModel = Patient::find()->all();
        
        foreach ($oModel as $obj) {
            $pid = $obj->id;
            //adl_month
            $sql = "CALL add_adl_month($pid)";
            MyHelper::execSql($sql);
        }
        return '1';
    }

}
