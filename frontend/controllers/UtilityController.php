<?php

namespace frontend\controllers;
use common\components\AppController;

use frontend\models\Person;
use frontend\models\FilePerson;
use common\components\MyHelper;
use frontend\models\Patient;

class UtilityController extends AppController
{
        
    public function actionTime(){
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
    

}
