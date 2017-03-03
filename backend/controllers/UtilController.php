<?php
namespace backend\controllers;


use common\components\AppController;

use frontend\models\Person;
use frontend\models\FilePerson;
use common\components\MyHelper;

class UtilController extends AppController
{
    public function actionAjaxTime(){
        return date('Y-m-d H:i:s');
    }
    
    public function actionLastJobTime(){
        $sql = " SELECT t.job_datetime FROM system_job_log t ORDER BY t.job_datetime DESC LIMIT 1 ";
        $raw = \Yii::$app->db->createCommand($sql)->queryScalar();
        return $raw;
    }
    public function actionProcessList(){
        return $this->render('process-list');
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
