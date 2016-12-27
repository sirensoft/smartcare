<?php

namespace common\components;

use yii\helpers\ArrayHelper;

class MyHelper extends \yii\base\Component {

    public static function dropDownItems($sql = NULL, $id = NULL, $val = NULL) {

        $raw = \Yii::$app->db->createCommand($sql)->queryAll();
        $items = ArrayHelper::map($raw, $id, $val);

        return $items;
    }

}
