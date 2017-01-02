<?php

namespace common\components;

use yii\helpers\ArrayHelper;
use frontend\models\CLine;

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
    
     public static function getUserId(){
        if(!\Yii::$app->user->isGuest){
            return \Yii::$app->user->identity->id;
        }  else {
            return '0';
        }
    }

}
