<?php

namespace common\components;

use yii\helpers\ArrayHelper;
use frontend\models\CLine;
use frontend\models\Version;

class MyHelper extends \yii\base\Component {
    
    

    public static function dropDownItems($sql = NULL, $id = NULL, $val = NULL) {

        $raw = \Yii::$app->db->createCommand($sql)->queryAll();
        $items = ArrayHelper::map($raw, $id, $val);

        return $items;
    }
    public static function getLineApi(){
        $LINE_API = "https://notify-api.line.me/api/notify";  // https://notify-bot.line.me/my/
        return $LINE_API;
    }
    
    public static function getLineToken(){
        $model = CLine::findOne(['line_name'=>'care','status'=>1]);
        return $model->line_token;
    }
    
    public static function sendLineNotify($message = NULL) {

        $LINE_API = MyHelper::getLineApi();
        $LINE_TOKEN = MyHelper::getLineToken();
        
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
    

    public static function getUserOffice(){
        if(!\Yii::$app->user->isGuest){
            return \Yii::$app->user->identity->office;
        }  else {
            return '00000';
        }
    }
    
    public static function getUserRole(){
        if(!\Yii::$app->user->isGuest){
            return \Yii::$app->user->identity->role;
        }  else {
            return 0;
        }
    }
    public static function isCg(){
        if(!\Yii::$app->user->isGuest){
            return \Yii::$app->user->identity->role===3;
        }  else {
            return FALSE;
        }
    }
    
     public static function isCm(){
        if(!\Yii::$app->user->isGuest){
            return \Yii::$app->user->identity->role===2;
        }  else {
            return FALSE;
        }
    }
    
     public static function isAdmin(){
        if(!\Yii::$app->user->isGuest){
            return \Yii::$app->user->identity->role===1;
        }  else {
            return FALSE;
        }
    }
    
    public static function isGuest(){
        return \Yii::$app->user->isGuest;
    }

    
    public static function getUserId(){
        if(!\Yii::$app->user->isGuest){
            return \Yii::$app->user->identity->id;
        }  else {
            return '0';
        }
    }
    
    public static function setPatientADL($pid=NULL){
       $sql = "select adl_score from assessment where patient_id = $pid and (adl_score is not null and adl_score != '') order by id DESC limit 1";
       $adl = \Yii::$app->db->createCommand($sql)->queryScalar();
       $sql = "update patient set adl='$adl' where id=$pid";
       return \Yii::$app->db->createCommand($sql)->execute();
       
    }
    
    public static function setPatientTAI($pid=NULL){
       $sql = "select tai_class from assessment where patient_id = $pid and (tai_class is not null and tai_class != '') order by id DESC limit 1";
       $tai = \Yii::$app->db->createCommand($sql)->queryScalar();
       $sql = "update patient set tai='$tai' where id=$pid";
       return \Yii::$app->db->createCommand($sql)->execute(); 
    }
    
    public static function getVersion(){
      $model = Version::find()->orderBy(['id'=>SORT_DESC])->one();
      return $model->version." (".$model->note1.")";
    }
    
    public static function execSql($sql){
        
        return \Yii::$app->db->createCommand($sql)->execute();
    }

}
