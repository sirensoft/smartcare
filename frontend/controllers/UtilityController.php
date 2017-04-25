<?php

namespace frontend\controllers;

use common\components\AppController;
use frontend\models\files43\Person;
use frontend\models\files43\FilePerson;
use common\components\MyHelper;
use frontend\models\Patient;
use frontend\models\FileSpecialpp;
use frontend\models\Specialpp;



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
    
      public function actionSpecialpp() {

     
        $oModel = FileSpecialpp::find()->all();

        foreach ($oModel as $obj) {
            $clone = new Specialpp();
            $clone->attributes = $obj->attributes;

            try {
                $clone->save();
            } catch (\yii\db\Exception $e) {
                $clone->isNewRecord = false;
                $clone->save();
            }
        }
        return '1';
    }

    public function actionAddAdlMon() {

        $sql = "CALL set_adl_month";
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

    public function actionLoseVisit() {
        //call on 13.00 dialy
        $send_sms = TRUE;
        $date = date('Y-m-d');

        $sql = " SELECT t.`name`,t.lname,u.u_name cg 
FROM patient t
LEFT JOIN `user` u ON u.id = t.cg_id
WHERE t.next_visit_date = CURDATE()
AND t.id not in 
(SELECT DISTINCT v.patient_id FROM visit v WHERE v.date_visit = CURDATE()) ";

        $date = \Yii::$app->formatter->asDate($date);
        $i = 1;
        $raw = \Yii::$app->db->createCommand($sql)->queryAll();
        
        if (count($raw) == 0) {
            $send_sms = FALSE;
        }

        $msg = "*แจ้งเตือน*\r\nผู้สูงอายุที่ยังไม่ได้รับการเยี่ยมดูแล\r\nตามแผนประจำวันที่ $date\r\n";
        if (date('H') < 13) {
            $msg = "\r\nผู้สูงอายุที่มีแผนเยี่ยมดูแล\r\nประจำวันที่ $date\r\n";
        }

        foreach ($raw as $val) {
            $msg.= $i . ") " . $val['name'] . " " . $val['lname'] . "  (CG:" . $val['cg'] . ")\r\n";
            $i++;
        }

        $msg.="(แจ้งโดยระบบอัตโนมัติ)";
        if ($send_sms) {
            MyHelper::sendLineNotify('care', $msg);
        }


        echo date('H:i:s');
        echo "<br>";
        echo $msg;
    }
    public function actionTestLine($g){
        MyHelper::sendLineNotify($g, "Hello!");
    }
    

}
