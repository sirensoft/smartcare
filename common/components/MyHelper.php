<?php

namespace common\components;

use yii\helpers\ArrayHelper;

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
