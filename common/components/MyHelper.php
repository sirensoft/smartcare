<?php

namespace common\components;

use yii\helpers\ArrayHelper;
use frontend\models\CLine;
use frontend\models\Version;
use backend\models\User;
use frontend\models\Patient;
use frontend\models\CHospital;

class MyHelper extends \yii\base\Component {

    public static function dropDownItems($sql = NULL, $id = NULL, $val = NULL) {

        $raw = \Yii::$app->db->createCommand($sql)->queryAll();
        $items = ArrayHelper::map($raw, $id, $val);

        return $items;
    }

    public static function getLineApi() {
        $LINE_API = "https://notify-api.line.me/api/notify";  // https://notify-bot.line.me/my/
        return $LINE_API;
    }

    public static function getLineToken($group) {
        $model = CLine::findOne(['line_name' => $group, 'status' => 1]);
        return $model->line_token;
    }

    public static function sendLineNotify($group,$message = NULL) {

        $LINE_API = MyHelper::getLineApi();
        $LINE_TOKEN = MyHelper::getLineToken($group);

        $queryData = ['message' => $message];
        $queryData = http_build_query($queryData, '', '&');
        $headerOptions = [
            'http' => [
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                . "Authorization: Bearer " . $LINE_TOKEN . "\r\n"
                . "Content-Length: " . strlen($queryData) . "\r\n",
                'content' => $queryData
            ]
        ];
        $context = stream_context_create($headerOptions);
        $result = file_get_contents($LINE_API, FALSE, $context);
        //$res = json_decode($result);
        return $result;
    }

    public static function getUserOffice() {
        if (!\Yii::$app->user->isGuest) {
            return \Yii::$app->user->identity->office;
        } else {
            return '00000';
        }
    }
    
    public static function getUserOfficeName() {
        if (!\Yii::$app->user->isGuest) {
            $hos= \Yii::$app->user->identity->office;
            return CHospital::findOne($hos)->hosname;
        } else {
            return '00000';
        }
    }

    public static function getUserRole() {
        if (!\Yii::$app->user->isGuest) {
            return \Yii::$app->user->identity->role;
        } else {
            return 0;
        }
    }

    public static function isCg() {
        if (!\Yii::$app->user->isGuest) {
            return \Yii::$app->user->identity->role === 3;
        } else {
            return FALSE;
        }
    }

    public static function isCm() {
        if (!\Yii::$app->user->isGuest) {
            return \Yii::$app->user->identity->role === 2;
        } else {
            return FALSE;
        }
    }

    public static function isAdmin() {
        if (!\Yii::$app->user->isGuest) {
            return \Yii::$app->user->identity->role === 1;
        } else {
            return FALSE;
        }
    }

    public static function isGuest() {
        return \Yii::$app->user->isGuest;
    }

    public static function getUserId() {
        if (!\Yii::$app->user->isGuest) {
            return \Yii::$app->user->identity->id;
        } else {
            return '0';
        }
    }
    
    public static function getUserName() {
        if (!\Yii::$app->user->isGuest) {
            return \Yii::$app->user->identity->username;
        } else {
            return 'unknow';
        }
    }
    
     public static function getUserFullName() {
        if (!\Yii::$app->user->isGuest) {
            $u = User::findOne(\Yii::$app->user->identity->id);
            return $u->u_name.' '.$u->u_lname;
        } else {
            return 'unknow';
        }
    }

    public static function setPatientADL($pid = NULL) {
        $sql = "select adl_score from assessment where patient_id = $pid and (adl_score is not null and adl_score != '') order by date_serv DESC limit 1";
        $adl = \Yii::$app->db->createCommand($sql)->queryScalar();
        $sql = "update patient set adl='$adl' where id=$pid";
        return \Yii::$app->db->createCommand($sql)->execute();
    }

    public static function setPatientTAI($pid = NULL) {
        $sql = "select tai_class from assessment where patient_id = $pid and (tai_class is not null and tai_class != '') order by date_serv DESC limit 1";
        $tai = \Yii::$app->db->createCommand($sql)->queryScalar();
        $sql = "update patient set tai='$tai' where id=$pid";
        return \Yii::$app->db->createCommand($sql)->execute();
    }

    public static function getVersion() {
        $model = Version::find()->orderBy(['id' => SORT_DESC])->one();
        return $model->version . " (" . $model->note1 . ")";
    }

    public static function execSql($sql) {

        return \Yii::$app->db->createCommand($sql)->execute();
    }

    public static function getCgId($patient_id) {
        $model = Patient::findOne($patient_id);
        return $model->cg_id;
    }

    public static function getDay($date) {
        return date('D', strtotime($date));
    }

    public static function ptInfoDiv($pid) {
        $model = Patient::findOne($pid);
        return "<div style='background-color:#ffc0cb;color: black; padding: 3px;margin-bottom: 5px'>
                <b>$model->prename $model->name  $model->lname   $model->age_y ปี ($model->class_name)</b>    
                </div>  ";
    }
    
    public static function ptInfo_($pid){
        $model = Patient::findOne($pid);
        return "$model->prename $model->name  $model->lname   $model->age_y ปี ($model->class_name)";
        
    }
    
    public static function ptRapidColor($pid){
        
        $pt = Patient::findOne($pid);
            $sql = " SELECT t.rapid_code FROM plan t  WHERE  t.patient_id = '$pid'
                ORDER BY t.id DESC LIMIT 1 ";
            $color = \Yii::$app->db->createCommand($sql)->queryScalar();
            $pt->color = empty($color) ? NULL : $color;
            $pt->save();

        
    }
    
    public static function getPlan($pid,$start_date,$time){
          $sql = " SELECT t.patient_id
,t.start_date 
,DATE_FORMAT(t.start_time,'%H') start_time
,GROUP_CONCAT(t.title) title
FROM plan_week t
WHERE t.patient_id = '$pid' AND t.start_date='$start_date' AND DATE_FORMAT(t.start_time,'%H') = $time
GROUP BY t.patient_id,t.start_date,DATE_FORMAT(t.start_time,'%H')";
          
          $raw=\Yii::$app->db->createCommand($sql)->queryOne();
          return empty($raw['title'])?'':$raw['title'];
          
    }
    
    public static function datePlus($cdate,$day){
        $date = new \DateTime($cdate);
        $date->modify("+$day day");
        return $date->format('Y-m-d');
        
    }
    public static function getPatientCid($pid){
        $pt=Patient::findOne($pid);
        return $pt->cid;
    }

}
