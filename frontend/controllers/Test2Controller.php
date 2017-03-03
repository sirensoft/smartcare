<?php

namespace frontend\controllers;

use frontend\models\Person;
use frontend\models\FilePerson;

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

    public function actionPerson() {

        $obj = Person::findOne(['HOSPCODE' => '07552']);

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
