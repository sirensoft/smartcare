<?php

namespace frontend\modules\ehr\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "log_ehr".
 *
 * @property string $status

 */
class OnOffEhr extends ActiveRecord{
    
     public static function getDb()
    {
        return \Yii::$app->get('db_hdc');
    }
    public static function tableName()
    {
        return 'ehr_onoff';
    }
    
    public function rules() {
        return [
            [['status'],'safe']
        ];
    }
}
